import toast from 'react-hot-toast';

export const successLoginMessage = "با موفقیت وارد شدید";
export const successSentLoginCodeMessage = "کد ورود با موفقیت ارسال شد.";
export const connectionError = "ارتباط با سرور قطع شده است. دوباره تلاش کنید";
export const successLogoutMessage = "با موفقیت از حساب کاربری خود خارج شدید";
export const alreadyRegistered = "این شماره قبلا در سامانه ثبت شده";
export const IncorrectFieldEntered = "شماره یا رمز عبور اشتباه وارد شده است";

export const successAlert = (message) => toast.success(message);
export const errorAlert = (message) => toast.error(message);