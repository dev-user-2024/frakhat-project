import { useState } from 'react'
import styles from './NewsCategoryMain.module.css'
import image from '../../../assets/images/tagsCard-img1.png'
import TitleLine from '../../title-line/title-line.component'
import HorizontalNewsCard from '../../UI/horizontal-news-card/horizontal-news-card.component'

const NewsCategoryMain = ({categoryData}) => {

  return (
    <div className={`${styles.category_container} w-100 d-flex flex-column justify-content-start`}>
      <div className={`${styles.title_links} d-flex justify-content-between`}>
        <TitleLine title='دسته بندی' />
      </div>
      <div className={`${styles.mix_news} d-flex flex-column justify-content-start`}>
        {
          categoryData.slice(-9).map(item => (
            <HorizontalNewsCard typeUse={'categoryNews'}  key={item.id} id={item.id} image={`https://support.frakhat.ir/${item.image}`} title={item.title} summary={''} content={item && item.content} />
          ))
        }
      </div>

    </div>
  )
}

export default NewsCategoryMain