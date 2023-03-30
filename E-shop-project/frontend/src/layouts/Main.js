import Header from '../components/header/Header';
import Footer from '../components/footer/Footer';
import Loading from '../components/loading/Loading';
import Message from '../components/messages/Message';
import { useLocation } from "react-router-dom";
import { useEffect, useContext } from 'react';
import MainContext from '../context/MainContext';

function Main(props) {
    const navigation = useLocation();
    const {setMessage} = useContext(MainContext);

    useEffect(() => {
        setMessage(false);
    }, [navigation]);

    return (
        <>
            <Loading />
            <Header />
            <div className="container">
                <Message />
                {props.children}
            </div>
            <Footer />
        </>
    );
}

export default Main;