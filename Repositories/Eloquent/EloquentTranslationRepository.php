<?php namespace Modules\Translation\Repositories\Eloquent;

use Illuminate\Support\Facades\Cache;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;
use Modules\Translation\Entities\Translation;
use Modules\Translation\Entities\TranslationTranslation;
use Modules\Translation\Repositories\TranslationRepository;

class EloquentTranslationRepository extends EloquentBaseRepository implements TranslationRepository
{
    /**
     * @param string $key
     * @param string $locale
     * @return string
     */
    public function findByKeyAndLocale($key, $locale = null)
    {
        $locale = $locale ?: app()->getLocale();

        //cache all translations of this locale hierarchically for the length of the request...
        $allHierarchical = $this->getAllHierarchicalRequestCached($locale);
        return isset($allHierarchical[$key]) ? $allHierarchical[$key] : '';

        //legacy code...
        /*
        $translation = $this->model->whereKey($key)->with('translations')->first();
        if ($translation && $translation->hasTranslation($locale)) {
            return $translation->translate($locale)->value;
        }
        return '';
        */
    }

    public function allFormatted()
    {
        $allRows = $this->all();
        $allDatabaseTranslations = [];
        foreach ($allRows as $translation) {
            foreach (config('laravellocalization.supportedLocales') as $locale => $language) {
                if ($translation->hasTranslation($locale)) {
                    $allDatabaseTranslations[$locale][$translation->key] = $translation->translate($locale)->value;
                }
            }
        }

        return $allDatabaseTranslations;
    }

    public function saveTranslationForLocaleAndKey($locale, $key, $value)
    {
        $translation = $this->findTranslationByKey($key);
        $translation->translateOrNew($locale)->value = $value;
        $translation->save();
    }

    public function findTranslationByKey($key)
    {
        return $this->model->firstOrCreate(['key' => $key]);
    }

    /**
     * Update the given translation key with the given data
     * @param string $key
     * @param array $data
     * @return mixed
     */
    public function updateFromImport($key, array $data)
    {
        $translation = $this->findTranslationByKey($key);
        $translation->update($data);
    }

    /**
     * Set the given value on the given TranslationTranslation
     * @param TranslationTranslation $translationTranslation
     * @param string $value
     * @return void
     */
    public function updateTranslationToValue(TranslationTranslation $translationTranslation, $value)
    {
        $translationTranslation->value = $value;
        $translationTranslation->save();
    }


    /**
     * We build an associative array, holding all the translations found in the database for the given locale.
     * This array is cached, but only for the length of 1 request. Proper caching happens in the CacheTranslationDecorator
     *
     * @param $locale
     * @return mixed
     */
    private function getAllHierarchicalRequestCached($locale) {
        $that = $this;
        return Cache::remember('all_translations_hierarchical_' . $locale, 0, function() use ($that, $locale) {
            $all = $that->getAllInLocale($locale);
            return $that->buildHierarchy($all);
        });
    }


    private function getAllInLocale($locale) {
        $all = Translation::whereHas('translations', function($q) use ($locale) {
            $q->where('locale', $locale);
        })->with(['translations' => function($q) use ($locale) {
            $q->where('locale', $locale);
        }])->get();
        return $all->lists('value', 'key')->toArray();
    }

    /**
     * http://stackoverflow.com/a/6088147/237739
     * @param $array
     * @return array
     */
    private function buildHierarchy($array) {
        $out = array();
        foreach ($array as $key=>$val) {
            $r = & $out;
            foreach (explode(".", $key) as $key) {
                if (!isset($r[$key])) {
                    $r[$key] = array();
                }
                $r = & $r[$key];
            }
            $r = $val;
        }
        return $out;
    }
}
