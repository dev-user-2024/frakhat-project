
import { useState, useEffect } from 'react'
import { useSearchParams } from "react-router-dom"
import Button from "../../components/buttons/button.component"
import { Link } from "react-router-dom"

import styles from "./callbackPage.module.css"

const CallbackPage = () => {

    let [searchParams] = useSearchParams()
    const [codeResponse, setCodeResponse] = useState("در حال انتظار ...")

    const code = searchParams.get("c")

    let message;


    useEffect(() => {
        switch (code) {
            case "100":
                message = "پرداخت موفق. دوره برای شما ثبت شد"
                break;
            case "-1":
                message = 'از پراخت منصرف شدید'
                break;
            case "-2":
                message = 'عملیات پرداخت با شکست روبرو شد'
                break;
            case "-3":
                message = 'تراکنشی یافت نشد'
                break;
            case "-4":
                message = 'پاسخی از بانک دریافت نشد'
                break;
            case "-5":
                message = 'اتصال به درگاه پذیرفته نشد، دوباره تلاش کنید'
                break;
            default:
                message = "خطای داخل سیستم. "
        }

        setCodeResponse(message)
    }, [code])



    return (
        <div className={`${styles.CallbackPage} d-flex text-center`}>
            <div className={`${styles.CallbackPage_content} d-flex`}>
                <h1>{codeResponse}</h1>
                <Link to="/user-panel">
                    <Button id="btn_courses" buttonType="headerButton" type="button" >
                        بازگشت به پنل
                    </Button>
                </Link>
            </div>

        </div>
    )
}

export default CallbackPage