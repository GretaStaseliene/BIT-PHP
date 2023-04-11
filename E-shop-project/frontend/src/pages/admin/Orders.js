import { useEffect, useContext, useState } from "react";
import axios from "axios";
import MainContext from "../../context/MainContext";

function Orders() {
    const [data, setData] = useState([]);
    const [active, setActive] = useState(false);
    const { setLoading, setMessage, refresh, setRefresh } = useContext(MainContext);

    useEffect(() => {
        setLoading(true);

        axios.get('http://localhost:8000/api/orders')
            .then(resp => setData(resp.data))
            .finally(() => setLoading(false));
    }, [refresh]);

    const handleChange = (id, is_completed) => {

        setActive(!active);

        axios.put('http://localhost:8000/api/orders/' + id, { is_completed: !is_completed })
            .then(resp => {
                setMessage({ m: resp.data, s: 'success ' });
                setRefresh(!refresh);
            });
    }

    return (
        <>
            <h1>Orders</h1>

            <table className='table'>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Surname</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Payment</th>
                        <th>Shipping</th>
                        <th>Product QTY</th>
                        <th>Product_ID</th>
                        <th>Created</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    {data.map(item =>
                        <tr key={item.id}>
                            <td>{item.id}</td>
                            <td>{item.first_name}</td>
                            <td>{item.last_name}</td>
                            <td>{item.address}</td>
                            <td>{item.phone} </td>
                            <td>{item.email}</td>
                            <td>{item.payment_method === 1 && 'Paypal'}
                                {item.payment_method === 2 && 'Visa'}
                                {item.payment_method === 3 && 'MasterCard'}</td>
                            <td>{item.shipping_method === 1 && 'DPD'}
                                {item.shipping_method === 2 && 'Omniva'}
                                {item.shipping_method === 3 && 'LP Express'}</td>
                            <td>{item.product_qty}</td>
                            <td>{item.product_id}</td>
                            <td>{(new Date(item.created_at)).toLocaleString('lt-LT')}</td>
                            <td>
                                <div className="form-check form-switch">
                                    <label className="form-check-label">
                                        <input className="form-check-input"
                                            type="checkbox"
                                            role="switch"
                                            onChange={() => handleChange(item.id, item.is_completed)}
                                            checked={item.is_completed}
                                        />
                                        {!item.is_completed ? 'Being prepared' : 'Shipped'}
                                    </label>
                                </div>
                                {/* <button 
                                onClick={() => handleChange(item.id, item.is_completed)}
                                
                                className="btn btn-primary">
                                    {item.is_completed ? 'Shipped' : 'Pending'}
                                </button> */}
                            </td>
                        </tr>
                    )}
                </tbody>
            </table>
        </>
    );
}

export default Orders;