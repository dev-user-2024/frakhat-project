import styles from './search.module.css'
import searchIcon from '../../assets/icons/search-normal-icon.svg'
import clockIcon from '../../assets/icons/clock-search-icon.svg'
import image from '../../assets/images/CourseDetailsMissionsCard.img4.png'
import { useSearchParams } from 'react-router-dom'
import { useRef, useState } from 'react'


const Search = () => {
  const [searchParams, setSearchParams] = useSearchParams()
  const inputRef = useRef(null);

  return (
    <div className={styles.search_container}>
      <div className={styles.search_input}>
        <div>
          <input type="text" placeholder='جستوجو...' ref={inputRef} />
          <button onClick={() => setSearchParams({search: inputRef.current.value, filter: 'tp-link'})}>
            <img src={searchIcon} alt="search icon" />
            جست‌و‌جو
          </button>
        </div>
      </div>
      <div className={styles.search_result}>
        <span>125 مورد یافت شد</span>
        <div>
          <div className={styles.search_image}>
            <img src={image} alt="" />
          </div>
          <div className={styles.search_content}>
            <h4>نمایشگاه کتاب</h4>
            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد..</p>
            <div className={styles.date}>
              <div>
                <img src={clockIcon} alt="" />
                <span>22 مرداد 1401</span>
              </div>
              <div>
                <span>
                  ساعت 10:55
                </span>
              </div>
            </div>
            <div className={styles.tags}>
              <span>کتاب</span>
              <span>نمایشگاه</span>
              <span>فرهنگی</span>
            </div>
          </div>
        </div>
        <div>
          <div className={styles.search_image}>
            <img src={image} alt="" />
          </div>
          <div className={styles.search_content}>
            <h4>نمایشگاه کتاب</h4>
            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد..</p>
            <div className={styles.date}>
              <div>
                <img src={clockIcon} alt="" />
                <span>22 مرداد 1401</span>
              </div>
              <div>
                <span>
                  ساعت 10:55
                </span>
              </div>
            </div>
            <div className={styles.tags}>
              <span>کتاب</span>
              <span>نمایشگاه</span>
              <span>فرهنگی</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  )
}

export default Search