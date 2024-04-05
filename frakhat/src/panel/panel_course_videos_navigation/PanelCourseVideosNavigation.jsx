import { useState } from 'react'
import { Link } from "react-router-dom"
import Button from "../../components/buttons/button.component"
import styles from "./panelCourseVideosNavigation.module.css"
import Logo from "../../assets/icons/Logo.svg"

import DownloadIcon from '../../assets/icons/Download.svg'
import attachmentIcon1 from '../../assets/icons/attachment-icon1.svg'
import attachmentIcon2 from '../../assets/icons/attachment-icon2.svg'
import videoPlay1 from '../../assets/icons/video-play-icon1.svg'
import videoPlay2 from '../../assets/icons/video-play-icon2.svg'
import PanelCourseVideos from '../panel_course_videos-page/PanelCourseVideos'
import PanelCourseVideosFiles from '../panel_course_videos_files-page/PanelCourseVideosFiles'

const PanelCourseVideosNavigation = () => {
    const [tab, setTab] = useState("video")

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

            {/* <div className={styles.course_information}>
                <p>دوره مترجمی انگلیسی همزمان</p>
                <p>تعداد جلسات: 21</p>
                <p>مدرس: آقای علی محمدی</p>
                <p>وضعیت: پایان یافته</p>
                <button>
                    <img src={DownloadIcon} alt="" />
                    دانلود گواهینامه
                </button>
            </div> */}

            <div className={`${styles.PanelNavigation_tab} d-flex mt-4`}>
                <div className={`${tab === "video" ? styles.active__tab : styles.inactive}`} title="ویدیو" onClick={() => setTab("video")}>
                    {tab === "video" ? <img src={videoPlay1} alt='user icon'></img> : <img src={videoPlay2} alt='user icon'></img>}
                    ویدیو
                </div>
                <div className={`${tab === "files" ? styles.active__tab : styles.inactive}`} title="فایل های ضمیمه" onClick={() => setTab("files")}>
                    {tab === "video" ? <img src={attachmentIcon1} alt='user icon'></img> : <img src={attachmentIcon2} alt='user icon'></img>}
                    فایل های ضمیمه
                </div>
            </div>
            <div className={`${styles.PanelNavigation} d-flex`}>
                {
                    tab === "video" ?
                        <PanelCourseVideos />
                        :
                        <PanelCourseVideosFiles/>
                }
            </div>
        </div>
    )
}

export default PanelCourseVideosNavigation