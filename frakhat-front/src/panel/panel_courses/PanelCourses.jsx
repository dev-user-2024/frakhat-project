

import styles from "./panelCourses.module.css"
import leftArrow from '../../assets/icons/card-arrow-left-icon.svg'
import { Link } from 'react-router-dom'
import moment from 'moment-jalaali';
import { ScaleLoader } from "react-spinners";

const PanelCourses = ({ purchasedCourses, isLoading }) => {
  return (
    isLoading ?
      (
        <div style={{ margin: "200px" }} className='d-flex justify-content-center w-100'>
          <ScaleLoader size={20} color='#375288' />
        </div>
      ) :
      (
        <div className={`${styles.PanelCourses_container} `}>
          {
            purchasedCourses?.map((item, index) => (
              <div key={index} className={styles}>
                <div className={styles.cardImage}>
                  <Link to={`/user-panel-course/${item.license}`}>
                    <img src={`https://support.frakhat.ir/${item.course.thumbnail_course}`} alt="" />
                  </Link>
                </div>
                <div className={styles.cardContent}>
                  <p>عنوان دوره: {item.course.title_course}</p>
                  <p>تاریخ شروع دوره: {moment(item.course.created_at).format("D MMM")}</p>
                  <p>شهریه: {item.course.price_course}</p>
                  <p>وضعیت: </p>
                  <Link to={`/user-panel-course/${item.license}`}>
                    <img src={leftArrow} alt="" />
                  </Link>
                </div>
              </div>
            ))
          }
        </div>
      )
  )
}

export default PanelCourses