<?php namespace Modules\Translation\Services;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Modules\Translation\Repositories\TranslationRepository;

class Translator extends \Illuminate\Translation\Translator
{
    use DispatchesJobs;
    /**
     * Get the translation for the given key.
     *
     * @param  string  $key
     * @param  array   $replace
     * @param  string  $locale
     * @param  bool  $fallback
     * @return string
     */
    public function get($key, array $replace = [], $locale = null, $fallback = true)
    {

        $translationRepository = app(TranslationRepository::class);
        $translation = $translationRepository->findByKeyAndLocale($key, $locale);

        //when no valid translation found, return the default laravel translator value
        if(!$translation) {
            return parent::get($key, $replace, $locale);
        }

        //if what we got back is not an array, we just replace and return
        if(!is_array($translation)) {
            return $this->makeReplacements($translation, $replace);
        }

        //in case of an array, we need to merge with the original,
        //because some of our translations might not have been persisted to the database yet
        //@todo this expensive array_merge isn't cached yet...
        $original = parent::get($key, $replace, $locale);
        $merged = array_merge($original, $translation);
        return $this->makeReplacements($merged, $replace);
    }
}
