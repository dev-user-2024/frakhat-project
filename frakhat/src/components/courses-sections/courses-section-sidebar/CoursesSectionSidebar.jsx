import { Accordion, AccordionDetails, AccordionSummary, FormControl, FormControlLabel, Radio, RadioGroup } from '@mui/material'
import * as Styled from './styled'
import arrow from '../../../assets/icons/CoursesLanding-arrowdown2arrowdown.svg'

const CoursesSectionSidebar = () => {
    return (
        <>
            <Styled.SliderContainer>
                <h3>فیلتر ها</h3>
                <Accordion>
                    <AccordionSummary
                        expandIcon={<img src={arrow} />}
                    >
                        <h4>دسته‌بندی دوره‌ها</h4>
                    </AccordionSummary>
                    <AccordionDetails>
                        <form action="">
                            <FormControl>
                                <RadioGroup>
                                    <FormControlLabel value="هوش مصنوعی" control={<Radio />} label="هوش مصنوعی" />
                                    <FormControlLabel value="گرافیک و دیزاین" control={<Radio />} label="گرافیک و دیزاین" />
                                    <FormControlLabel value="کارآفرینی" control={<Radio />} label="کارآفرینی" />
                                    <FormControlLabel value="مهارت‌های نرم" control={<Radio />} label="مهارت‌های نرم" />
                                    <FormControlLabel value="برنامه‌نویسی" control={<Radio />} label="برنامه‌نویسی" />
                                    <FormControlLabel value="زبان‌های خارجه" control={<Radio />} label="زبان‌های خارجه" />
                                    <FormControlLabel value="عکاسی" control={<Radio />} label="عکاسی" />
                                    <FormControlLabel value="سئو" control={<Radio />} label="سئو" />
                                </RadioGroup>
                            </FormControl>
                        </form>
                    </AccordionDetails>
                </Accordion>
                {/* <Accordion>
                    <AccordionSummary
                        expandIcon={<img src={arrow} />}
                    >
                        <h4>هزینه دوره</h4>
                    </AccordionSummary>
                    
                </Accordion> */}
            </Styled.SliderContainer>
        </>
    )
}

export default CoursesSectionSidebar