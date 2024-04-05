import React, { useEffect, useState } from 'react'
import JobsDetailsProfile from './JobsDetailsProfile/JobsDetailsProfile'
import JobAdvertisementInformation from './JobAdvertisementInformation/JobAdvertisementInformation'
import JobsDetailsToggle from './JobsDetailsToggle/JobsDetailsToggle'
import { useParams } from 'react-router-dom'
import { api } from '../../services'

const JobsDetailsSection = () => {
    const { id } = useParams()
    const [jobDetail, setJobDetail] = useState([])

    useEffect(() => {
        (async () => {
            const { data: { data } } = await api().get(`/jobs/${id}`)
            setJobDetail(data.data)
        })()
    }, [id])


    return (
        <div>
            <JobsDetailsProfile jobDetail={jobDetail}/>
            <hr />
            <JobAdvertisementInformation jobDetail={jobDetail}/>
            <JobsDetailsToggle jobDetail={jobDetail}/>
        </div>
    )
}

export default JobsDetailsSection