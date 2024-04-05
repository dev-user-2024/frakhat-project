import React from 'react'
import Button from 'react-bootstrap/Button';
import Modal from 'react-bootstrap/Modal';
import { Player } from 'video-react';
import "../../../../node_modules/video-react/dist/video-react.css"
import styles from "./square-news-card-video.module.css"
import playButtonIcon from "../../../assets/icons/video-play-icon.svg"

function MyVerticallyCenteredModal({ onHide, show, videoSrc, videoCover, summary }) {
    return (
        <Modal
            onHide={onHide}
            show={show}
            size="xl"

            aria-labelledby="contained-modal-title-vcenter"
            centered
        >
            <Modal.Header closeButton >
                <Modal.Title id="contained-modal-title-vcenter">
                </Modal.Title>
            </Modal.Header>
            <Modal.Body dir="ltr" style={{ height: 500 }} >
                <Player
                    poster={videoCover}
                    src={videoSrc}
                    fluid={''}
                    width={"100%"}
                    height={450}
                />
                <p dir='rtl' className='mt-2'>{summary}</p>
            </Modal.Body>
            <Modal.Footer>
                <Button className='px-2' onClick={onHide}>بستن</Button>
            </Modal.Footer>
        </Modal>
    );
}

const SquareNewsCardVideo = ({ image, title, videoUrl }) => {
    const [modalShow, setModalShow] = React.useState(false);

    return (
        <div className={`${styles.card_video_container} d-flex flex-column justify-content-center align-items-start`}
        >
            <div className={`${styles.card_video_cover}`}>
                <img src={image} alt="" className={styles.card_image} />
                <img src={playButtonIcon} className={styles.card_cover_button} onClick={() => setModalShow(true)} alt="" />
            </div>
            <div className={styles.title_video}>
                <p>{title && title.length > 22 ? title.slice(0, 22) + "..." : title}</p>
            </div>

            <MyVerticallyCenteredModal
                videoCover={image}
                videoSrc={videoUrl}
                title={title}
                show={modalShow}
                onHide={() => setModalShow(false)}
            />
        </div>
    )
}

export default SquareNewsCardVideo

