import styles from './JobsAllPosition.module.css'
import profile from '../../../assets/images/jobs-profile.png'
import starProfile from '../../../assets/icons/jobs-star.svg'
import sendProfile from '../../../assets/icons/jobs-send.svg'
import locationIcon from '../../../assets/icons/landingJobs-location.svg'
import { useEffect } from 'react'
import { api } from '../../../services'
import Pagination from 'react-bootstrap/Pagination';
import React, { useState } from 'react';
import { Link, useLocation } from 'react-router-dom'
import { Button, Modal } from 'react-bootstrap';
import { Document, Page } from '@react-pdf/renderer';


const JobsAllPostion = () => {
    const [jobs, setJobs] = useState([])
    const [activePage, setActivePage] = useState(1);
    const [show, setShow] = useState(false);
    const [pdfFile, setPdfFile] = useState(null);
    const location = useLocation()


    const handleFileSelect = async (event) => {
        setPdfFile(event.target.files[0]);
    };

    useEffect(() => {
        const queryParams = new URLSearchParams(location.search);
        const jobTitle = queryParams.get('title');
        const jobGroup = queryParams.get('jobGroup');
        const jobLocation = queryParams.get('location');
        const employment_type = queryParams.get('employment_type');
        const minimum_salary = queryParams.get('minimum_salary');
        const minimum_experience = queryParams.get('minimum_experience');
        const sort = queryParams.get('sort');

        let url = '/jobs';
        if (jobTitle || jobGroup || jobLocation || employment_type || minimum_salary || minimum_experience || sort) {
            url = `/jobs-search?location=${jobLocation || ''}&job_group=${jobGroup || ''}&title=${jobTitle || ''}&employment_type=$${employment_type || ''}&minimum_experience=${minimum_experience || ''}&minimum_salary=${minimum_salary || ''}&sort=${sort || ''}`;
        }

        (async () => {
            const { data } = await api().get(url)
            setJobs(data.data);
        })()
    }, [location.search])

    const itemsPerPage = 10;
    const totalPages = Math.ceil(jobs.length / itemsPerPage);

    const handlePageChange = (pageNumber) => {
        setActivePage(pageNumber);
    };

    const renderPageItems = () => {
        const pageItems = [];
        for (let i = 1; i <= totalPages; i++) {
            pageItems.push(
                <Pagination.Item key={i} active={i === activePage} onClick={() => handlePageChange(i)} className={styles.page_item}>
                    {i}
                </Pagination.Item>
            );
        }
        return pageItems;
    };

    const submitResume = async (e, Job_id) => {
        e.preventDefault()
        try {
            const formData = new FormData();
            formData.append('pdf', pdfFile);

            const res = await api.post('/resume',{
                Job_id,
                resume: formData,
            });
        } catch (error) {
            console.error('Upload error:', error);
        }
    }

    return (
        <div className={styles.JobsAllPostionContainer}>
            <div className={styles.JobsAllPostionContent}>
                {
                    jobs?.map((job, index) => (
                        <div key={index}>
                            <div className={styles.cardContent}>
                                <div>
                                    <div className={styles.jobCard}>
                                        <div>
                                            <Link to={`/jobs-details/${job.id}`}>
                                                <h4>{job.title}</h4>
                                            </Link>
                                        </div>
                                        <div>
                                            <span>{job.company}</span>
                                        </div>
                                        <div className={styles.jobLocation}>
                                            <img src={locationIcon} alt="" />
                                            <span>{job.location}</span>
                                        </div>
                                        <div className={styles.jobTag}>
                                            <div>
                                                حضوری
                                            </div>
                                            <div>
                                                تمام وقت
                                            </div>
                                            <div>
                                                حقوق از 18 میلیون تومان
                                            </div>
                                        </div>
                                        <div className={styles.jobContent}>
                                            <ul>
                                                <pre className={styles.preTag}>
                                                    {job.job_description}
                                                </pre>
                                            </ul>
                                        </div>
                                        <div className={styles.jobButtons}>
                                            <span>{job.course}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div className={styles.profile}>
                                <Link to={`/jobs-details/${job.id}`}>
                                    <img src={profile} alt="" />
                                </Link>
                                <div className={styles.buttonsProfile}>
                                    <button onClick={() => setShow(true)}>
                                        <img src={sendProfile} alt="" />
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
                                    <form onSubmit={(e) => submitResume(e, job.id)}>
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
                    ))
                }
            </div>
            <div>
                {jobs.slice((activePage - 1) * itemsPerPage, activePage * itemsPerPage).map((item) => (
                    <div key={item.id}>
                        <p>{item.name}</p>
                    </div>
                ))}
                <div className={styles.pagination}>
                    <Pagination>
                        <Pagination.Prev disabled={activePage === 1} onClick={() => setActivePage(activePage - 1)} className={styles.prevNext}>قبلی</Pagination.Prev>
                        {renderPageItems()}
                        <Pagination.Next disabled={activePage === totalPages} onClick={() => setActivePage(activePage + 1)} className={styles.prevNext}>بعدی</Pagination.Next>
                    </Pagination>
                </div>
            </div>
        </div>
    )
}

export default JobsAllPostion