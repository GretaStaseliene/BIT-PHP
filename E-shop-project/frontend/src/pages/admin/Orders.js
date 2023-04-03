import { useEffect, useContext, useState } from "react";
import axios from "axios";
import MainContext from "../../context/MainContext";
import { Link } from "react-router-dom";

function Orders() {
    const [data, setData] = useState([]);
    const { setLoading } = useContext(MainContext);

    useEffect(() => {
        setLoading(true);

        axios.get('http://localhost:8000/api/orders')
            .then(resp => setData(resp.data))
            .finally(setLoading(false));
    }, []);

    return (
        <>
            <div className='d-flex justify-content-between align-items-center mb-3'>
                <h1>Orders</h1>
                <div className='d-flex gap-3 justify-content-end'>
                    <Link to='/admin/orders/new-order' className='btn btn-primary'>New Order</Link>
                </div>
            </div>
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
                        <th>Status</th>
                        <th>Created</th>
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
                            <td>{item.payment_method}</td>
                            <td>{item.shipping_method}</td>
                            <td>{item.product_qty}</td>
                            <td>{item.product_id}</td>
                            <td>{item.is_completed}</td>
                            <td>{(new Date(item.created_at)).toLocaleString('lt-LT')}</td>
                            <td>
                                <Link to={'/admin/orders/edit-order/' + item.id} className="btn btn-primary">Edit</Link>
                            </td>
                        </tr>
                    )}
                </tbody>
            </table>
        </>
    );
}

export default Orders;