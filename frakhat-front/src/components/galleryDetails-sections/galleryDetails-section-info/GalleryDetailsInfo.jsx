

import React from 'react'
import Button from "../../buttons/button.component"
import styles from "./GalleryDetailsInfo.module.css"
import moment from 'moment-jalaali';

import CameraIcon from '../../../assets/icons/gallery-details-camera.svg'
import ClockIcon from '../../../assets/icons/gallery-details-clock.svg'

const GalleryDetailsInfo = ({ gallery, category }) => {
  let momentTime = moment("2023-06-15T15:51:49.000000Z", gallery.updated_at);

  return (
    <div className={`${styles.GalleryDetailsInfo_container} d-flex flex-column`}>
      <h3>{gallery.title}</h3>
      <p>{gallery.content}</p>
      <div className={` ${styles.GalleryDetailsInfo_details} d-flex align-items-center justify-content-between`}>
        <div className={`${styles.GalleryDetailsInfo_details_text} d-flex align-items-center`}>
          <div>
            <img src={CameraIcon} alt="" />
            <p>{category}</p>
          </div>
          <div className='d-flex'>
            <img src={ClockIcon} alt="" />
            <p>{momentTime.format("D MMM")}</p>
            <p> {momentTime.format("HH:mm")}</p>
          </div>
        </div>
        <Button id="btn_courses" buttonType="galleryDetailsButton" type="button" >
          دانلود آلبوم
        </Button>
      </div>

    </div>
  )
}

export default GalleryDetailsInfo