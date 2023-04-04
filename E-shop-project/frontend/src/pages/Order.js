import { useParams, useNavigate } from "react-router-dom";
import axios from "axios";
import { useContext } from "react";
import MainContext from "../context/MainContext";

function Order() {
    const { productId, productQty } = useParams();
    const { setMessage, setLoading} = useContext(MainContext);
    const navigate = useNavigate();

    const handleSubmit = (e) => {
        e.preventDefault();

        const data = new FormData(e.target);

        data.append('product_id', productId);
        data.append('product_qty', productQty);

        setLoading(true);
        axios.post('http://localhost:8000/api/orders/', data)
        .then(resp => {
            setMessage({ m: resp.data, s: 'success' });
            setTimeout(() => navigate('/'), 1000);
        })
        .catch(error => {
            setMessage({ m: error.response.data, s: 'danger' })
        })
        .finally(() => setLoading(false));
    }

    return (
        <>
            <h2>Place your info </h2>
            <form onSubmit={handleSubmit}>
                <div className="mb-3">
                    <label className="form-label">First Name</label>
                    <input type="text" name="first_name" className="form-control" required />
                </div>
                <div className="mb-3">
                    <label className="form-label">Last Name</label>
                    <input type="text" name="last_name" className="form-control" required />
                </div>
                <div className="mb-3">
                    <label className="form-label">Address</label>
                    <input type="text" name="address" className="form-control" required />
                </div>
                <div className="mb-3">
                    <label className="form-label">Phone</label>
                    <input type="text" name="phone" className="form-control" required />
                </div>
                <div className="mb-3">
                    <label className="form-label">Email</label>
                    <input type="text" name="email" className="form-control" required />
                </div>

                <div className="mb-3">
                    <h5 className="form-label">Payment Method:</h5>
                    <div className="mb-1">
                        <label>
                            <input
                                type="radio" name="payment_method"className="form-check-input me-2"
                                value='1' />
                            Paysera
                        </label>
                    </div>
                    <div className="mb-1">
                        <label>
                            <input
                                type="radio" name="payment_method"className="form-check-input me-2"
                                value='2' />
                            Visa
                        </label>
                    </div>
                    <div className="mb-1">
                        <label>
                            <input
                                type="radio" name="payment_method"className="form-check-input me-1"
                                value='3' />
                            MasterCard
                        </label>
                    </div>
                </div>
                <div className="mb-3">
                    <h5 className="form-label">Shipping Method:</h5>
                    <div className="mb-1">
                        <label>
                            <input
                                type="radio" name="shipping_method" className="form-check-input me-2"
                                value='1' />
                            DPD
                        </label>
                    </div>
                    <div className="mb-1">
                        <label>
                            <input
                                type="radio" name="shipping_method" className="form-check-input me-2"
                                value='2' />
                            Omniva
                        </label>
                    </div>
                    <div class="mb-1">
                        <label>
                            <input
                                type="radio" name="shipping_method" className="form-check-input me-2"
                                value='3' />
                            LP Express
                        </label>
                    </div>
                </div>

                <button className="btn btn-primary">Order</button>
            </form>
        </>
    );
}

export default Order;