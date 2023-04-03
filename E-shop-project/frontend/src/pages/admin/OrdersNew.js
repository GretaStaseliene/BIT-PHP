import axios from 'axios';
import { useContext } from 'react';
import { useNavigate } from 'react-router-dom';
import MainContext from '../../context/MainContext';

function NewOrder() {

  const { setLoading, setMessage } = useContext(MainContext);

  const navigate = useNavigate();

    const handleSubmit = (e) => {
        e.preventDefault();

        const data = new FormData(e.target);
        
        setLoading(true);
        axios.post('http://localhost:8000/api/orders', data)
            .then(resp => {
                setMessage({ m: resp.data, s: 'success' });
                setTimeout(() => navigate('/admin/orders'), 1000);
            })
            .catch(error => {
                setMessage({ m: error.response.data, s: 'danger' })
            })
            .finally(() => setLoading(false));
    }

    return (
        <>
            <h1>New Order</h1>

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
                    <label className="form-label">Payment Method</label>
                    <input type="text" name="payment_method" className="form-control" required />
                </div>
                <div className="mb-3">
                    <label className="form-label">Shipping Method</label>
                    <input type="text" name="shipping_method" className="form-control" required />
                </div>
                <div className="mb-3">
                    <label className="form-label">Product Quantity</label>
                    <input type="text" name="product_qty" className="form-control" required />
                </div>
                <div className="mb-3">
                    <label className="form-label">Product ID</label>
                    <input type="text" name="product_id" className="form-control" required />
                </div>
                <button className="btn btn-primary">Create</button>
            </form>
        </>
    );
}

export default NewOrder;