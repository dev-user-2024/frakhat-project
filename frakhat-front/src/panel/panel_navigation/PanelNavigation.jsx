import { useEffect, useState } from 'react'
import { Link } from "react-router-dom"
import PanelProfile from "../panel_profile/PanelProfile"
import PanelCourses from "../panel_courses/PanelCourses"
import Button from "../../components/buttons/button.component"
import styles from "./panelNavigation.module.css"
import Logo from "../../assets/icons/Logo.svg"

import UserIcon1 from '../../assets/icons/user-icon1.svg'
import UserIcon2 from '../../assets/icons/user-icon2.svg'
import DocumentIcon1 from '../../assets/icons/document-icon1.svg'
import DocumentIcon2 from '../../assets/icons/document-icon2.svg'
import { api } from '../../services'
import { useAuth } from '../../hooks/useAuth'

const PanelNavigation = () => {
    const [tab, setTab] = useState("profile")
    const { user } = useAuth()
    const [purchasedCourses, setPurchasedCoutses] = useState([])
    const [isLoading, setIsLoading] = useState(true);

    useEffect(() => {
        (async () => {
            const { data } = await api().get(`/orders/${user.id}/purchased-courses`)
            setPurchasedCoutses(data.course)
            setIsLoading(false)
        })()
    }, [user.id])
    
    return (
        <div className={styles.PanelNavigationContainer}>
            <div className={styles.PanelNavigation_header}>
                <div className={styles.PanelNavigation_header_logo}>
                    <Link to="/">
                        <span><img className={styles.logoIcon} src={Logo} alt="" /></span>
                    </Link>
                </div>
                <div className={styles.PanelNavigation_header_profile}>
                    <Link to="/">
                        <Button id="btn_courses" buttonType="headerButton" type="button" style={{ width: '120px' }} >
                            خرید دوره جدید
                        </Button>
                    </Link>
                </div>
            </div>

            <div className={`${styles.PanelNavigation_tab} d-flex mt-4`}>
                <div className={`${tab === "profile" ? styles.active__tab : styles.inactive}`} title="حساب کاربری" onClick={() => setTab("profile")}>
                    {tab === "profile" ? <img src={UserIcon1} alt='user icon'></img> : <img src={UserIcon2} alt='user icon'></img>}
                    حساب کاربری
                </div>
                <div className={`${tab === "courses" ? styles.active__tab : styles.inactive} ${styles.courses}`} title="دوره ها" onClick={() => setTab("courses")}>
                    {tab === "profile" ? <img src={DocumentIcon1} alt='user icon'></img> : <img src={DocumentIcon2} alt='user icon'></img>}
                    دوره ها
                </div>
            </div>
            <div className={`${styles.PanelNavigation} d-flex`}>
                {
                    tab === "profile" ?
                        <PanelProfile />
                        :
                        <PanelCourses purchasedCourses={purchasedCourses} isLoading={isLoading} />
                }
            </div>
        </div>
    )
}

export default PanelNavigation