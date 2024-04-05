import styles from './NewsCategoryCards.module.css'
import moment from 'moment-jalaali';
import { Link } from 'react-router-dom';

const NewsCategoryCards = ({ categoryData }) => {
  return (
    <div className={styles.news_category_cards_container}>
      <div className={styles.row1}>
        {
          categoryData.slice(-3).map((item, index) => (
            <div key={index}>
              <img src={`https://support.frakhat.ir/${item.image}`} alt="" />
              <div className={styles.bg}></div>
              <Link to={`/mag/magDetails/${item.id}`}>{item.content.length > 60 ? item.content.slice(0, 50) + '...' : item.content}</Link>
            </div>
          ))
        }
      </div>
      <div className={styles.row2}>
        {
          categoryData.slice(-8 ,-4).map((item, index) => (
            <div key={index}>
              <img src={`https://support.frakhat.ir/${item.image}`} alt="" />
              <div className={styles.card_content}>
                <div>
                  <h5>{item.title.length > 30 ? item.title.slice(0, 30) + '...' : item.title}</h5>
                  <Link to={`/mag/magDetails/${item.id}`}>{item.summary.length > 60 ? item.summary.slice(0, 60) + '...' : item.summary}</Link>
                  
                </div>
                <div>
                  <span>{moment("2023-06-15T15:51:49.000000Z", item.created_at).format("D MMM")}</span>
                  <span>{moment("2023-06-15T15:51:49.000000Z", item.created_at).format("HH:mm")}</span>
                </div>
              </div>
            </div>
          ))
        }
      </div>
    </div>
  )
}

export default NewsCategoryCards