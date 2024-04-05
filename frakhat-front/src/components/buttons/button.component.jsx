
import styles from "./button.module.css";

const BUTTON_TYPE_CLASSES = {
    headerButton : "header-button",
    navigationButton: "navigation-button",
    commentButton: "comment-button",
    zPatternButton: "zPattern-button",
    completeForm: "completeForm-button",
    paymentButton: "payment-button",
    galleryDetailsButton: "galleryDetails-button",
    courseBannerButton : "courseBanner-button",
    courseDetailsBannerButton1 : "courseDetailsBanner1-button",
    courseDetailsBannerButton2 : "courseDetailsBanner2-button",
    loginPageButton : "loginPage-button",
    mobileMenuButton :  "mobileMenuButton-button",
    buycourseDiscountButton : "buycourse_discount_button",
    tagsPaginationButton: "tags-pagination-button",
    cartButton: "button-cart"
}

const Button = ({ children, buttonType, ...otherProps }) => {
    const ButtonName = BUTTON_TYPE_CLASSES[buttonType]
    return (
        <button
            className={`${styles.button_container} ${styles[ButtonName]}`}
            {...otherProps}
        >
            {children}
        </button>

    )
}

export default Button;