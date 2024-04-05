import React, { useEffect, useState } from 'react'
import { useParams } from 'react-router-dom';
import { useAuth } from '../../hooks/useAuth';
import { api } from '../../services';
import styles from './PanelCourseVideosFiles.module.css'
import FilesImage from '../../assets/images/files-image.png'

const PanelCourseVideosFiles = () => {
    // const [tab, setTab] = useState("active_tab")
    const [tabIndex, setTabIndex] = useState(0)
    const [files, setFiles] = useState([])
    const [courseList] = useState([
        {
            "videoTitle": "جلسه اول: مفاهیم- 31 اردیبهشت 1401",
            "videoName": "jadeh-abrisham.mp3",
            "mehmanName": "ابوقاسم",
            "mehmanImageName": "aboghasem.png"
        },
        {
            "videoTitle": "جلسه اول: مفاهیم- 31 اردیبهشت 1401",
            "videoName": "kordism.mp3",
            "mehmanName": "ابوقاسم",
            "mehmanImageName": "aboghasem.png"
        },
        {
            "videoTitle": "جلسه اول: مفاهیم- 31 اردیبهشت 1401",
            "videoName": "ghafghaz-asia-markazi.mp3",
            "mehmanName": "کاظمی",
            "mehmanImageName": "kazemi.png"
        },
        {
            "videoTitle": "جلسه اول: مفاهیم- 31 اردیبهشت 1401",
            "videoName": "resaneh-hoshmand.mp3",
            "mehmanName": "مومن نسب",
            "mehmanImageName": "momen-nasab.png"
        },
        {
            "videoTitle": "جلسه اول: مفاهیم- 31 اردیبهشت 1401",
            "videoName": "naghsh-sahunist.mp3",
            "mehmanName": "طائب",
            "mehmanImageName": "taeb.png"
        },
        {
            "videoTitle": "جلسه اول: مفاهیم- 31 اردیبهشت 1401",
            "videoName": "naghsh-sahunist-dar-ghafghaz.mp3",
            "mehmanName": "طائب",
            "mehmanImageName": "taeb.png"
        },
        {
            "videoTitle": "جلسه اول: مفاهیم- 31 اردیبهشت 1401",
            "videoName": "tahrifgari-sahunist-dar-tahavolat-akhir.mp3",
            "mehmanName": "طائب",
            "mehmanImageName": "taeb.png"
        },
        {
            "videoTitle": "جلسه اول: مفاهیم- 31 اردیبهشت 1401",
            "videoName": "nazm-novin-jahani.mp3",
            "mehmanName": "خوش چشم",
            "mehmanImageName": "khosh-cheshm.png"
        },
        {
            "videoTitle": "جلسه اول: مفاهیم- 31 اردیبهشت 1401",
            "videoName": "hokmrani-cybery-resanehei.mp3",
            "mehmanName": "آل داوود",
            "mehmanImageName": "aledavood.png"
        },
        {
            "videoTitle": "جلسه اول: مفاهیم- 31 اردیبهشت 1401",
            "videoName": "jang-tarkibi.mp3",
            "mehmanName": "آل داوود",
            "mehmanImageName": "aledavood.png"
        },
    ])
    const { id } = useParams();
    const auth = useAuth();


    return (
        <div className={styles.PanelCourseVideos}>
            <div className={styles.PanelCourseVideos_main}>
                <div className={styles.PanelCourseVideos_list}>
                    {
                        courseList.map((item, index) => (
                            <div
                                key={index}
                                onClick={() => {
                                    setTabIndex(index)
                                    window.scrollTo(0, 0);
                                }}
                                className={`${styles.VideosListItem} ${tabIndex === index ? styles.activeClass : ""}`}
                            >
                                <span>{item.videoTitle} </span>
                            </div>
                        ))
                    }
                </div>
                <div className={styles.PanelCourseVideos_files}>
                    <img src={FilesImage} alt="" />
                </div>
            </div>
        </div>
    )
}

export default PanelCourseVideosFiles