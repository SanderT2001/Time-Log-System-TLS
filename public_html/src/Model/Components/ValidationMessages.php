<?php

namespace App\Model\Components;

/**
 * ValidationMessages Class
 *
 * Class used to return consistent Validation Error Messages (and also with translation).
 * This Class contains static functions, so Validation Error Messages can be gotten without creating a new Instance of
 *   this class everytime you want to use this.
 *
 * @since   0.1 Since the beginning of this Application.
 * @version 0.1
 *
 * @author Sander Tuinstra <sandert2001@hotmail.com>
 */
class ValidationMessages
{
    public const TRANSLATION_DOMAIN   = 'validation';

    // All Validation Error Messages start with this:
    public const MSG_START_TEXT       = 'This field';

    // The string that will be returned (if fully build).
    private static $validationMessage = '';
    private const MESSAGES = [
        'notPresent'       => 'must be present',
        'noValue'          => 'cannot be empty',
        // %s => The argument (in the @see sprintf();) is treated as string and displays as string.
        'maxLength'        => 'cannot contain more than %s characters',
        'invalidValueType' => 'is not a valid %s'
    ];

    /**
     * Private Static Function initialize
     *
     * Cleans the string to return (@see self::$validationMessage).
     * Note. This function should be called in every other function within this class!
     *
     * @access private static
     */
    private static function initialize()
    {
        // Add the StartText to the ValidationMessage.
        self::$validationMessage = self::MSG_START_TEXT.' ';
    }

    /**
     * Public Statis Function getNotPresent
     *
     * @access public static
     *
     * Returns the Validation Error Message corresponding to a not present value.
     * Corresponding Validation Rule: requiresPresence()
     *
     * @return string => Containing the full corresponding validation message (also translated).
     */
    public static function getNotPresent()
    {
        self::initialize();

        $fullMessage = self::$validationMessage.self::MESSAGES['notPresent'];
        return __d(self::TRANSLATION_DOMAIN, $fullMessage);
    }

    /**
     * Public Static Function getEmpty
     *
     * @access public static
     *
     * Returns the Validation Error Message corresponding to a empty value.
     * Corresponding Validation Rule: notEmpty()
     *
     * @return string => Containing the full corresponding validation message (also translated).
     */
    public static function getEmpty()
    {
        self::initialize();

        $fullMessage = self::$validationMessage.self::MESSAGES['noValue'];
        return __d(self::TRANSLATION_DOMAIN, $fullMessage);
    }

    /**
     * Public Static Function getMaxLength
     *
     * @access public static
     *
     * Returns the Validation Error Message corresponding to a max length exceeded value.
     * Corresponding Validation Rule: maxLength()
     *
     * @param  int    $maxLength => Containing the max length of the value for in the validation message.
     * @return string            => Containing the full corresponding validation message (also translated).
     */
    public static function getMaxLength(int $maxlength)
    {
        self::initialize();

        $formattedMsgWithMaxLength = sprintf(
            self::MESSAGES['maxLength'],
            // Replace the %s in the @see self::MSG_MAX_LENGTH with the actual maximum value given in @param $maxLength.
            $maxlength
        );

        $fullMessage = self::$validationMessage.$formattedMsgWithMaxLength;
        return __d(self::TRANSLATION_DOMAIN, $fullMessage);
    }

    /**
     * Public Static Function getInvalidValueType
     *
     * @access public static
     *
     * Returns the Validation Error Message corresponding to a invalid value by a given type, ex. 'email'.
     * Corresponding Validation Rule: notEmpty()
     *
     * @param  string $type => Containing the actual required type of the value, ex. 'int'.
     * @return string       => Containing the full corresponding validation message (also translated).
     */
    public static function getInvalidValueType(string $type)
    {
        self::initialize();

        $formattedMsgWithType = sprintf(
            self::MESSAGES['invalidValueType'],
            // Replace the %s in the @see self::MSG_INVALID_VALUE with the actual maximum value given in @param $type.
            $type
        );

        $fullMessage = self::$validationMessage.$formattedMsgWithType;
        return __d(self::TRANSLATION_DOMAIN, $fullMessage);
    }
}
