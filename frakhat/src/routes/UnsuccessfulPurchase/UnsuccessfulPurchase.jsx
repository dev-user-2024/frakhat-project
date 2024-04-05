import styled from './UnsuccessfulPurchase.module.css'
import UnsuccessfulPurchaseImgae from '../../assets/images/Unsuccessful-purchase-icon.png'
import { Link } from 'react-router-dom'
import { useEffect } from 'react'

const UnsuccessfulPurchase = () => {
    useEffect(() => {
        localStorage.removeItem("cartItems")
    }, [])

    return (
        <div className={styled.unsuccessful_purchase}>
            <div>
                <img src={UnsuccessfulPurchaseImgae} alt="" />
                <p>خرید دوره با موفقیت انجام شد.</p>
            </div>
            <Link to={'/buyCourse'}>
                <button>بازگشت به سبد خرید</button>
            </Link>
        </div>
    )
}

export default UnsuccessfulPurchase