import HomeSection1 from "./home-section-1/home-section1.component"
import HomeSection2 from "./home-section-2/home-section-2.component"
import HomeSection3 from "./home-section-3/home-section-3.component"
import HomeSection4 from "./home-section-4/home-section-4.component"
import HomeSection5 from "./home-section-5/home-section-5.component"
import HomeSection6 from "./home-section-6/home-section-6.component"
import HomeSection7 from "./home-section-7/home-section-7.component"
import PromotionalPhoto from "./home-section-promotionalPhoto/PromotionalPhoto"

const HomeSections = () => {
    return (
        <div>
            {/* <PromotionalPhoto/> */}
            <HomeSection1 />
            <HomeSection2 />
            <HomeSection3 />
            <HomeSection4 />
            <HomeSection5 />
            <HomeSection6 />
            <HomeSection7 />
        </div>
    )
}

export default HomeSections