<?php 
namespace Magecomp\Sms\Helper;

use Magento\Store\Model\ScopeInterface;

class Customer extends \Magecomp\Sms\Helper\Data
{
    //GENERAL
    const SMS_OTP_TYPE = 'sms/generalsection/otptype';
    const SMS_OTP_LENGTH = 'sms/generalsection/otplength';

    // USER TEMPLATE
    const SMS_IS_CUSTOMER_SIGNUP_CONFIRMATIOM = 'usertemplate/usersignupconfirm/enable';
    const SMS_CUSTOMER_SIGNUP_CONFIRMATIOM_TEMPLATE = 'usertemplate/usersignupconfirm/template';
    const SMS_IS_CUSTOMER_SIGNUP_NOTIFICATION = 'usertemplate/usersignup/enable';
    const SMS_CUSTOMER_SIGNUP_NOTIFICATION_TEMPLATE = 'usertemplate/usersignup/template';
    const SMS_IS_CUSTOMER_MOBILE_CONFIRMATIOM = 'usertemplate/usermobileconfirm/enable';
    const SMS_CUSTOMER_MOBILE_CONFIRMATIOM_TEMPLATE = 'usertemplate/usermobileconfirm/template';
    const SMS_IS_CUSTOMER_ORDER_CONFIRMATIOM = 'usertemplate/userorderconfirm/enable';
    const SMS_CUSTOMER_ORDER_CONFIRMATIOM_TEMPLATE = 'usertemplate/userorderconfirm/template';

	//ADMIN TEMPLATE
    const SMS_IS_ADMIN_SIGNUP_NOTIFICATION = 'admintemplate/adminsignup/enable';
    const SMS_ADMIN_SIGNUP_NOTIFICATION_TEMPLATE = 'admintemplate/adminsignup/template';

    public function getOtpType()
    {
        return $this->scopeConfig->getValue(self::SMS_OTP_TYPE,
            ScopeInterface::SCOPE_STORE,
            $this->getStoreid());
    }

    public function getOtpLength(){
        return $this->scopeConfig->getValue(self::SMS_OTP_LENGTH,
            ScopeInterface::SCOPE_STORE,
            $this->getStoreid());
    }

    public function getOtp()
    {
        if($this->getOtpType())
        {
            return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $this->getOtpLength());
        }
        else
        {
            return $randomString  = substr(str_shuffle("0123456789"), 0, $this->getOtpLength());
        }
    }

	public function isSignUpConfirmationForUser() {
        return $this->isEnabled() && $this->scopeConfig->getValue(self::SMS_IS_CUSTOMER_SIGNUP_CONFIRMATIOM,
            ScopeInterface::SCOPE_STORE,
            $this->getStoreid());
    }

    public function getSignUpConfirmationUserTemplate()
    {
        if($this->isEnabled())
        {
            return  $this->scopeConfig->getValue(self::SMS_CUSTOMER_SIGNUP_CONFIRMATIOM_TEMPLATE,
            ScopeInterface::SCOPE_STORE,
            $this->getStoreid());
        }
    }

    public function isSignUpNotificationForAdmin()
    {
        return $this->isEnabled() && $this->scopeConfig->getValue(self::SMS_IS_ADMIN_SIGNUP_NOTIFICATION,
                ScopeInterface::SCOPE_STORE,
                $this->getStoreid());
    }

    public function getSignUpNotificationForAdminTemplate()
    {
        if($this->isEnabled())
        {
            return  $this->scopeConfig->getValue(self::SMS_ADMIN_SIGNUP_NOTIFICATION_TEMPLATE,
                ScopeInterface::SCOPE_STORE,
                $this->getStoreid());
        }
    }

    public function isSignUpNotificationForUser()
    {
        return $this->isEnabled() && $this->scopeConfig->getValue(self::SMS_IS_CUSTOMER_SIGNUP_NOTIFICATION,
                ScopeInterface::SCOPE_STORE,
                $this->getStoreid());
    }

    public function getSignUpNotificationForUserTemplate()
    {
        if($this->isEnabled())
        {
            return  $this->scopeConfig->getValue(self::SMS_CUSTOMER_SIGNUP_NOTIFICATION_TEMPLATE,
                ScopeInterface::SCOPE_STORE,
                $this->getStoreid());
        }
    }

    public function isMobileConfirmationForUser()
    {
        return $this->isEnabled() && $this->scopeConfig->getValue(self::SMS_IS_CUSTOMER_MOBILE_CONFIRMATIOM,
                ScopeInterface::SCOPE_STORE,
                $this->getStoreid());
    }

    public function getMobileConfirmationUserTemplate()
    {
        if($this->isEnabled())
        {
            return  $this->scopeConfig->getValue(self::SMS_CUSTOMER_MOBILE_CONFIRMATIOM_TEMPLATE,
                ScopeInterface::SCOPE_STORE,
                $this->getStoreid());
        }
    }

    public function isOrderConfirmationForUser()
    {
        return $this->isEnabled() && $this->scopeConfig->getValue(self::SMS_IS_CUSTOMER_ORDER_CONFIRMATIOM,
                ScopeInterface::SCOPE_STORE,
                $this->getStoreid());
    }

    public function getOrderConfirmationUserTemplate()
    {
        if($this->isEnabled())
        {
            return  $this->scopeConfig->getValue(self::SMS_CUSTOMER_ORDER_CONFIRMATIOM_TEMPLATE,
                ScopeInterface::SCOPE_STORE,
                $this->getStoreid());
        }
    }
}