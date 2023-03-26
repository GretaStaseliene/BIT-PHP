import axios from 'axios';
import { useState } from 'react';
import { useNavigate } from 'react-router-dom';
import Message from '../../components/messages/Message';
import Loading from '../../components/loading/Loading';

function NewProduct() {
  const [loading, setLoading] = useState(false);
  const [message, setMessage] = useState();
  const navigate = useNavigate();

    const handleSubmit = (e) => {
        e.preventDefault();

        const data = new FormData(e.target);
        
        setLoading(true);
        axios.post('http://localhost:8000/api/products', data)
            .then(resp => {
                setMessage({ m: resp.data, s: 'success' });
                setTimeout(() => navigate('/admin'), 2000);
            })
            .catch(error => {
                setMessage({ m: error.response.data, s: 'danger' })
            })
            .finally(() => setLoading(false));
    }

    return (
        <>
            <Loading show={loading} />

            <h1>New Product</h1>

            <Message message={message} />

            <form onSubmit={handleSubmit}>
                <div className="mb-3">
                    <label className="form-label">Name</label>
                    <input type="text" name="name" className="form-control" required />
                </div>
                <div className="mb-3">
                    <label className="form-label">SKU</label>
                    <input type="text" name="sku" className="form-control" required />
                </div>
                <div className="mb-3">
                    <label className="form-label">Photo</label>
                    <input type="text" name="photo" className="form-control" required />
                </div>
                <div className="mb-3">
                    <label className="form-label">Warehouse quantity</label>
                    <input type="number" name="warehouse_qty" className="form-control" required />
                </div>
                <div className="mb-3">
                    <label className="form-label">Price</label>
                    <input type="number" step="0.01" name="price" className="form-control" required />
                </div>
                <button className="btn btn-primary">Create</button>
            </form>
        </>
    );
}

export default NewProduct;