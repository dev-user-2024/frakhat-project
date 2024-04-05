import styles from './NewsCategoryLanding.module.css'
import NewsCategoryCards from './NewsCategoryCards/NewsCategoryCards'
import NewsCategoryMain from './NewsCategoryMain/NewsCategoryMain'
import NewsCategorySidebar from './NewsCategorySidebar/NewsCategorySidebar'
import { useParams } from 'react-router-dom'
import { useEffect, useState } from 'react'
import { api } from '../../services'


const NewsCategoryLandingSection = () => {
  const { id } = useParams()
  const [categoryData, setCategoryData] = useState([])

  useEffect(() => {
    (async () => {
      const { data: { data } } = await api().get(`/posts-category/${id}`)
      setCategoryData(data.data)
    })()
  }, [id])

  return (
    <div className={styles.news_category_sections}>
      <NewsCategoryCards categoryData={categoryData}/>
      <div className={styles.news_category_section1}>
        <NewsCategoryMain categoryData={categoryData}/>
        <NewsCategorySidebar />
      </div>
    </div>
  )
}

export default NewsCategoryLandingSection