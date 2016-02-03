<?php

return [
    /*
     * Specify the strength of the generator
     * 
     * low:    Low Strength should be used anywhere that random strings are needed in a 
     *         non-cryptographical setting. They are not strong enough to be used as keys
     *         or salts. They are however useful for one-time use tokens.
     * medium: Medium Strength should be used for most needs of a cryptographic nature. 
     *         They are strong enough to be used as keys and salts. However, they do take
     *         some time and resources to generate, so they should not be over-used.
     * high:   High Strength keys should ONLY be used for generating extremely strong
     *         cryptographic keys. Generating them is very resource intensive and may
     *         take several minutes or more depending on the requested size.
     *         There are currently no mixers shipped with this package that are capable
     *         of creating a high space generator. This will not work out of the box!
     */
    'strength' => 'medium',
];
