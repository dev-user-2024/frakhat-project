import React, { useState } from 'react'
import Button from '../../buttons/button.component'
import style from './tagsPaginationSection.module.css'

import firstArrow from '../../../assets/icons/arrow-first.svg'
import rightArrow from '../../../assets/icons/arrow-right.svg'
import leftArrow from '../../../assets/icons/arrow-left.svg'
import lastArrow from '../../../assets/icons/arrow-last.svg'

const TagsPaginationSection = () => {
  const [pages] = useState([1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, "...", 20])

  return (
    <div className={style.paginationContainer}>
      <div className={style.tagsPaginationButton}>
        <Button buttonType='tagsPaginationButton'>
          <img src={firstArrow} alt="" />
          اولین
        </Button>
        <Button buttonType='tagsPaginationButton'>
          <img src={rightArrow} alt="" />
          قبلی
        </Button>
      </div>

      <div className={style.pages}>
        {pages.map((item, index) => (
          <button key={index}>{item}</button>
        ))}
      </div>

      <div className={style.tagsPaginationButton}>
        <Button buttonType='tagsPaginationButton'>
          بعدی
          <img src={leftArrow} alt="" />
        </Button>
        <Button buttonType='tagsPaginationButton'>
          آخرین
          <img src={lastArrow} alt="" />
        </Button>
      </div>
    </div>
  )
}

export default TagsPaginationSection