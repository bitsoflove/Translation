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
        //@todo this expensive array_merge_recursive_distinct isn't cached yet...
        $original = parent::get($key, $replace, $locale);

        // If there is no file found, use the database, and log a warning.
        if (!is_array($original)) {
            $original = [];

            \Log::warning("No lang file found for key '$key' and locale '$locale'. See Translation module.");
        }

        $merged = $this->array_merge_recursive_distinct($original, $translation);
        return $this->makeReplacements($merged, $replace);
    }


    /**
     * array_merge_recursive does indeed merge arrays, but it converts values with duplicate
     * keys to arrays rather than overwriting the value in the first array with the duplicate
     * value in the second array, as array_merge does. I.e., with array_merge_recursive,
     * this happens (documented behavior):
     *
     * array_merge_recursive(array('key' => 'org value'), array('key' => 'new value'));
     *     => array('key' => array('org value', 'new value'));
     *
     * array_merge_recursive_distinct does not change the datatypes of the values in the arrays.
     * Matching keys' values in the second array overwrite those in the first array, as is the
     * case with array_merge, i.e.:
     *
     * array_merge_recursive_distinct(array('key' => 'org value'), array('key' => 'new value'));
     *     => array('key' => array('new value'));
     *
     * Parameters are passed by reference, though only for performance reasons. They're not
     * altered by this function.
     *
     * @param array $array1
     * @param array $array2
     * @return array
     * @author Daniel <daniel (at) danielsmedegaardbuus (dot) dk>
     * @author Gabriel Sobrinho <gabriel (dot) sobrinho (at) gmail (dot) com>
     *
     * Via http://php.net/manual/en/function.array-merge-recursive.php
     */
    private function array_merge_recursive_distinct ( array &$array1, array &$array2 )
    {
        $merged = $array1;

        foreach ( $array2 as $key => &$value )
        {
            if ( is_array ( $value ) && isset ( $merged [$key] ) && is_array ( $merged [$key] ) )
            {
                $merged [$key] = $this->array_merge_recursive_distinct ( $merged [$key], $value );
            }
            else
            {
                $merged [$key] = $value;
            }
        }

        return $merged;
    }
}
