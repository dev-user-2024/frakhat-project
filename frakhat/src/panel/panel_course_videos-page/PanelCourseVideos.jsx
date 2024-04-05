
import { Link, useParams } from 'react-router-dom'
import { Player } from 'video-react';
import styles from "./panelCourseVideos.module.css"
import windowsIcon from '../../assets/images/windows-icon.png'
import macIcon from '../../assets/images/macos-icon.png'
import android from '../../assets/images/android-icon.png'
import chrome from '../../assets/images/chrome-icon.png'
import arrowLeftIcon from '../../assets/icons/arrow-left-help-icon.svg'
import { useMediaQuery } from 'react-responsive';
import { CopyToClipboard } from 'react-copy-to-clipboard';
import video from '../../assets/video/4_6001093228420403376.mp4'

const PanelCourseVideos = () => {
  const { license } = useParams()
  const isMobileDevice = useMediaQuery({
    query: "(max-width: 1100px)",
  });

  const isDesktop = useMediaQuery({
    query: "(min-width: 1100px)",
  });

  return (
    <>
      {
        <div className={styles.PanelCourseVideos}>
          <form className={styles.input}>
            <input type="text" value={license} />
            <CopyToClipboard text={license}>
              <button>کپی کردن</button>
            </CopyToClipboard>
          </form>
          <div className={styles.PanelCourseVideos_main}>
            <div className={styles.PanelCourseVideos_help}>
              <div>
                <h4>راهنمای مشاهده دوره</h4>
                <p>برای مشاهده دوره‌ها ابتدا پخش‌کننده را با توجه به سیستم عامل خود دانلود و نصب نمایید. پس از اجرای برنامه پخش‌کننده، در صفحه ثبت دوره جدید کلید لایسنس که در کادر بالا قرار دارد را کپی و وارد کنید، سپس مکان ذخیره‌سازی را انتخاب و فرم را تایید کنید. پخش‌کننده ویدیوهای دوره را در حین استریم در مکان تعیین شده ذخیره خواهد کرد.</p>
                <p> مطالب این دوره دارای واترمارک‌های پیدا و پنهان هستند و هر گونه کپی برداری و نشر آن قابل پیگیری بوده و موجب پیگرد قانونی خواهد شد.</p>
              </div>
              <div>
                <h4>دانلود و نصب پخش‌کننده</h4>
                <p>نسخه مناسب پلیر را با توجه به سیستم عامل خود دانلود و نصب کنید.</p>
                <div>
                  <div>
                    <a href='https://app.spotplayer.ir/assets/bin/spotplayer/setup.exe' target='_blank'><img src={windowsIcon} alt="" /></a>
                    <p>Windows</p>
                  </div>
                  <div>
                    <a href='https://app.spotplayer.ir/assets/bin/spotplayer/setup.dmg' target='_blank'><img src={macIcon} alt="" /></a>
                    <p>Mac OS</p>
                  </div>
                  <div>
                    <a href='https://app.spotplayer.ir/assets/bin/spotplayer/setup.apk' target='_blank'><img src={android} alt="" /></a>
                    <p>Android</p>
                  </div>
                  <div>
                    <a href='https://app.spotplayer.ir/' target='_blank'><img src={chrome} alt="" /></a>
                    <p>Web</p>
                  </div>
                </div>
                <div className={styles.guid_link}>
                  <Link to='/guide-list'>لیست راهنمای سایت فراخط <img src={arrowLeftIcon} alt="" /></Link>
                </div>
              </div>
            </div>
            <div>
              {
                isDesktop && <Player poster='' src={video} type="video/mp4" fluid='' width={567} height={370} />
              }
              {
                isMobileDevice && <Player poster='' src={video} type="video/mp4" fluid='' width={'100%'} height={370} />
              }
            </div>
          </div>
        </div>
      }
    </>
  )
}

export default PanelCourseVideos