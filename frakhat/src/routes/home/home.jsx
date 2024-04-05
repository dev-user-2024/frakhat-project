
import { useEffect } from "react";
import HomeSections from "../../components/home-sections/home-sections.component"
const Home = () => {
    useEffect(() => {
        window.scrollTo(0, 0);
    }, []);

    return (
        <div>
            <HomeSections />
        </div>
    )
}

export default Home