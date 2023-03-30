import { useContext } from "react";
import MainContext from "../../context/MainContext";

function Loading() {
    const { loading } = useContext(MainContext);
    
    return loading &&
        <div className='loading'>
            <div className="lds-spinner"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
        </div>

}

export default Loading;