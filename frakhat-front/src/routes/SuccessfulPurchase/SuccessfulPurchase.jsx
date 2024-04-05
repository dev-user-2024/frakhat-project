import styled from './SuccessfulPurchase.module.css'
import SuccessfulPurchaseImgae from '../../assets/images/Successful-purchase-icon.png'
import { Link } from 'react-router-dom'
import { useEffect } from 'react'

const SuccessfulPurchase = () => {
    useEffect(() => {
        localStorage.removeItem("cartItems")
    }, [])
    
    return (
        <div className={styled.successful_purchase}>
            <div>
                <img src={SuccessfulPurchaseImgae} alt="" />
                <p>خرید دوره با موفقیت انجام شد.</p>
            </div>
            <Link to={'/user-panel'}>
                <button>مشاهده دوره</button>
            </Link>
        </div>
    )
}

export default SuccessfulPurchase