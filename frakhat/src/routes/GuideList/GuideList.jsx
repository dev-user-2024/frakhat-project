import styled from './GuideList.module.css'
import image from '../../assets/images/help-list-image.png'

const GuideList = () => {
  return (
    <div className={styled.GuideList}>
        <div>
            <h4>لیست راهنمای فراخط</h4>
            <p>ثبت نام در سایت</p>
            <p>سبد خرید</p>
            <p>خرید دوره</p>
            <p>مشاهده دوره</p>
            <p>دوره رایگان</p>
            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ</p>
            <p>لورم ایپسوم متن ساختگی</p>
            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم</p>
        </div>
        <div>
            <img src={image} alt="" />
        </div>
    </div>
  )
}

export default GuideList