import Header from '../components/header/Header';
import Footer from '../components/footer/Footer';

function Main(props) {

    return(
        <>
            <Header />
            <div className="container">
                {props.children}
            </div>
            <Footer />
        </>
    );
}

export default Main;