import { Button, Modal } from 'react-bootstrap'
import styles from './SubmitResume.module.css'
import { Document, Page } from '@react-pdf/renderer'
import { useState } from 'react';

const SubmitResume = () => {
    const [url, setUrl] = useState(null);

    const [show, setShow] = useState(false);
    const handleClose = () => setShow(false);
    const handleShow = () => setShow(true);

    const handleFileSelect = (event) => {
        const file = event.target.files[0];
        const reader = new FileReader();
        reader.onload = () => {
            setUrl(reader.result);
        };
        reader.readAsDataURL(file);
    };

    return (
        <Modal show={show} onHide={handleClose} dir="rtl" centered>
            <Modal.Header closeButton className={styles['modal-header']}>
                <Modal.Title className={styles['modal-title']}>ارسال رزومه</Modal.Title>
            </Modal.Header>
            <Modal.Body className={styles['modal-body']}>
                {url && (
                    <Document file={url}>
                        <Page pageNumber={1} />
                    </Document>
                )}
            </Modal.Body>
            <Modal.Footer className={styles['modal-footer']}>
                <input
                    id="pdf-file"
                    type="file"
                    accept=".pdf"
                    onChange={handleFileSelect}
                />
                <Button onClick={handleClose}>
                    ارسال رزومه
                </Button>
            </Modal.Footer>
        </Modal>
    )
}

export default SubmitResume