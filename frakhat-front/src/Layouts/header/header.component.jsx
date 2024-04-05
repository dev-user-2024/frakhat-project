import { Link } from "react-router-dom"
import Button from "../../components/buttons/button.component"
import SearchBox from "../../components/search-box/SearchBox"
import LogoIcon from "../../assets/icons/Logo.svg"
import styles from './header.module.css'
import iranFlag from '../../assets/images/header-iranFlag.png'
import { Dropdown } from "react-bootstrap"
import CoursesSectionPromotionalPhoto from '../../components/courses-sections/courses-section-promotionalPhoto/CoursesSectionPromotionalPhoto'

const Header = () => {
    return (
        <>
            <div className={`${styles.header_container} d-flex justify-content-between  align-items-center pt-3 mb-3 `}>
                <div className={`${styles.header_links} d-flex align-items-center`}>
                    <Link to="/">
                        <img src={LogoIcon} className={`${styles.header_logo}`} alt="" />
                    </Link>
                    <div className={`${styles.header_links_items} d-flex align-items-center mb-0 `}>
                        <Link className={`${styles.header_links_item}`} to="/about">درباره فراخط</Link>
                        <Link className={`${styles.header_links_item}`} to="/contact-us">ارتباط با فراخط</Link>
                        <Link className={`${styles.header_links_item}`} to="/mag">
                            <Button id="btn_courses" buttonType="headerButton" type="button" >
                                مجله فراخط
                            </Button>
                        </Link>
                    </div>
                </div>
                <div className={`${styles.header_feature} d-flex align-items-center mb-0 `}>
                    <SearchBox />
                    <div className={`${styles.header_language}`}>
                        <Dropdown>
                            <Dropdown.Toggle variant="" className="d-flex align-items-center gap-2" id="dropdown-basic">
                                <img src={iranFlag} alt="" />
                                <p>فارسی</p>
                            </Dropdown.Toggle>

                            <Dropdown.Menu>
                                <Dropdown.Item className="text-end" href="#/action-1">عربي</Dropdown.Item>
                                <Dropdown.Item href="#/action-2">English</Dropdown.Item>
                            </Dropdown.Menu>
                        </Dropdown>

                    </div>
                </div>
            </div>
        </>
    )
}

export default Header