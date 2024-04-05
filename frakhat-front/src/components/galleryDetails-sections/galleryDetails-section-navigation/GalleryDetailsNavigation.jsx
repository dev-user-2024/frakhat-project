

import React from 'react'
import { Link } from "react-router-dom"
import Button from "../../buttons/button.component"
import searchIcon from "../../../assets/icons/galleryDetails.searchIcon.svg"

import styles from "./GalleryDetailsNavigation.module.css"

const GalleryDetailsNavigation = () => {
    return (
        <div className={`${styles.galleryNavigation_container} d-flex justify-content-between  align-items-center pt-3 mb-3 `}>

            <div className={`${styles.galleryNavigation_links} d-flex align-items-center`}
            >

                <div className={`${styles.galleryNavigation_links_items} d-flex align-items-center mb-0 `}>

                    <Link className={`${styles.galleryNavigation_links_item}`} to="">گالری</Link>
                    <Link className={`${styles.galleryNavigation_links_item}`} to="">خبری</Link>
                    <Link className={`${styles.galleryNavigation_links_item}`} to="">ایران</Link>
                    <Link className={`${styles.galleryNavigation_links_item}`} to="">مستند</Link>
                    <Link className={`${styles.galleryNavigation_links_item}`} to="">ورزشی</Link>
                    <Link className={`${styles.galleryNavigation_links_item}`} to="">دریافتی</Link>


                </div>

                
            </div>

            <div className={`${styles.galleryNavigation_center_links} d-flex align-items-center`}
            >

                <div className={`${styles.galleryNavigation_center_links_items} d-flex align-items-center mb-0 `}>

                    <Link className={`${styles.galleryNavigation_center_links_item}`} to="">عکس</Link>
                    <Link className={`${styles.galleryNavigation_center_links_item}`} to="">ویدیو</Link>

                </div>
            </div>


            <div className={`${styles.galleryNavigation_feature} d-flex align-items-center mb-0 `}>

                <div className={`${styles.galleryNavigation_search} d-flex align-items-center`}>

                    <form className={`d-flex align-items-center`} onSubmit>

                        <input
                            className={styles.pagesFormInput}
                            placeholder="موضوع یا عنوان تصویر را بنویسید..."
                            type="text"
                        // onChange={e => setName(e.target.value)}
                        />

                        <div>

                            <label className="form-input-label">از</label>
                            <input
                                className={styles.pagesFormInput}
                                type="text"

                            // onChange={e => setName(e.target.value)}
                            />
                        </div>
                        <div>

                            <label className="form-input-label">تا</label>
                            <input
                                className={styles.pagesFormInput}
                                type="text"

                            // onChange={e => setName(e.target.value)}
                            />
                        </div>

                        <Link className={`${styles.galleryNavigation_links_item}`} to="">
                            <Button id="btn_courses" buttonType="galleryDetailsButton" type="button" >
                                <img src={searchIcon} alt="" />
                                جست‌وجو
                            </Button>
                        </Link>

                    </form>

                </div>

            </div>

        </div>
    )
}

export default GalleryDetailsNavigation