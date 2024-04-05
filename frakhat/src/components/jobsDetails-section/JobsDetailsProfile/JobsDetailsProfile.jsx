import styles from './JobsDetailsProfile.module.css'
import profile from '../../../assets/images/jobs-profile.png'
import starProfile from '../../../assets/icons/jobs-star.svg'
import sendProfile from '../../../assets/icons/jobs-send.svg'
import { Button, Modal } from 'react-bootstrap'
import { useState } from 'react'
import { api } from '../../../services'

const JobsDetailsProfile = ({ jobDetail }) => {
  const [show, setShow] = useState(false);
  const [pdfFile, setPdfFile] = useState(null);

  const handleFileSelect = async (event) => {
    setPdfFile(event.target.files[0]);
  };

  const submitResume = async (e, Job_id) => {
    e.preventDefault()
    try {
      const formData = new FormData();
      formData.append('pdf', pdfFile);

      const res = await api.post('/resume', {
        Job_id,
        resume: formData,
      });
    } catch (error) {
      console.error('Upload error:', error);
    }
  }
  return (
    <div className={styles.profileContainer}>
      <div className={styles.imageProfile}>
        <img src={`https://support.frakhat.ir/${jobDetail.logo}`} alt="" />
      </div>
      <div className={styles.profileContent}>
        <div className={styles.infoProfile}>
          <div>
            <h4>صنایع لبنی مزرعه سبز</h4>
            <h4>Green Farm Industry</h4>
          </div>
          <div>
            <p>
              تاسیس 1398
            </p>
          </div>
          <div>
            <p>
              50 تا 200 نفر
            </p>
          </div>
        </div>
        <div className={styles.buttonsProfile}>
          <button>
            <img src={sendProfile} alt="" onClick={() => setShow(true)} />
            ارسال رزومه
          </button>
          <button>
            <img src={starProfile} alt="" />
            نشان کردن
          </button>
        </div>
      </div>


      <Modal show={show} onHide={() => setShow(false)} dir="rtl" centered>
        <Modal.Header closeButton className={styles['modal-header']}>
          <Modal.Title className={styles['modal-title']}>ارسال رزومه</Modal.Title>
        </Modal.Header>
        <Modal.Body className={styles['modal-body']}>

        </Modal.Body>
        <Modal.Footer className={styles['modal-footer']}>
          <form onSubmit={(e) => submitResume(e, jobDetail.id)}>
            <input
              id="pdf-file"
              type="file"
              accept=".pdf"
              onChange={handleFileSelect}
            />
            <Button type='submit'>
              ارسال رزومه
            </Button>
          </form>
        </Modal.Footer>
      </Modal>
    </div>
  )
}

export default JobsDetailsProfile