import { Player } from 'video-react';
import styles from './ad.module.css'
import smsIcon from '../../assets/icons/sms-ad-icon.svg'
import callIcon from '../../assets/icons/call-calling-ad-icon.svg'
import { convertNumberToPersian } from '../../utils/convertNumberToPersian';
import logo from '../../assets/images/ad-logo.png'
import { useState } from 'react';
import Footer from '../../Layouts/footer/footer.component';
import { useEffect } from 'react';
import { useForm } from 'react-hook-form';
import { successAlert } from '../../providers/AlertServiceProvider';
import { api } from '../../services';

const Ad = () => {
    const [visiblity, setVisiblity] = useState(false)
    const { register, handleSubmit, formState: { errors }, reset } = useForm();

    useEffect(() => {
        window.scrollTo(0, 0);
    }, [visiblity]);

    const submitMessage = async (formData) => {
        const { data } = await api().post('/contact-marketing', formData)
        successAlert(data.message)
        reset()
    }

    return (
        <>
            <div className={styles.adContainer}>
                <img src={logo} alt="logo" className={styles.logo} />
                <div className={styles.video}>
                    <div className={styles.videoHeader}>
                        <div>
                            <span>فراخط</span>
                            <span>آموزش، تصمین، درآمد</span>
                        </div>
                        <div>
                            <div>
                                <span>frakhat@biz.ir</span>
                                <img src={smsIcon} alt="sms icon" />
                            </div>
                            <div>
                                <span>{convertNumberToPersian('02112345678')}</span>
                                <img src={callIcon} alt="call calling icon" />
                            </div>
                        </div>
                    </div>
                    <div className={visiblity && 'd-none'}>
                        <Player
                            poster="/assets/poster.png"
                            src="https://media.w3.org/2010/05/sintel/trailer_hd.mp4"
                            fluid={''}
                            width={"100%"}
                            height={512}

                        />
                    </div>
                </div>
                <div className={styles.content}>
                    <div className={visiblity && 'd-none'}>
                        <h3>با خیال راحت تبلیغات خود را به فراخط بسپارید...</h3>
                        <p>
                            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می طلبد.
                        </p>
                        <div className={styles.contact_button}>
                            <button onClick={() => setVisiblity(true)}>
                                ارتباط با ما
                            </button>
                        </div>
                    </div>
                    <div>
                        <div>
                            <form onSubmit={handleSubmit(submitMessage)} className={`${styles.contact_form} ${visiblity && 'd-inline'}`} action="">
                                <h3>با ما در تماس باشید</h3>
                                <div>
                                    <div>
                                        <div>
                                            <label htmlFor="full_name">نام و نام خانوادگی</label>
                                            <input id='full_name' type="text" {...register('full_name', {
                                                required: "نام و نام خانوادگی الزامی است",
                                            })} />
                                            {errors.full_name && <span role="alert" className={styles.InvalidInput} >{errors.full_name.message}</span>}
                                        </div>
                                        <div>
                                            <label htmlFor="mobile">شماره تلفن</label>
                                            <input id='mobile' type="text" {...register('mobile', {
                                                required: "شماره تلفن الزامی است",
                                            })} />
                                            {errors.mobile && <span role="alert" className={styles.InvalidInput} >{errors.mobile.message}</span>}
                                        </div>
                                    </div>
                                    <div>
                                        <div>
                                            <label htmlFor="message">متن پیام</label>
                                            <textarea id="message" {...register('message', {
                                                required: "پیام الزامی است",
                                            })} />
                                            {errors.message && <span role="alert" className={styles.InvalidInput} >{errors.message.message}</span>}
                                        </div>
                                    </div>
                                </div>
                                <div className={styles.send_button}>
                                    <button type='submit'>
                                        ارسال
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <Footer />
        </>
    )
}

export default Ad