import { useState, useEffect } from 'react';
import axios from 'axios';
import { Link } from 'react-router-dom';
import Loading from '../../components/loading/Loading';
import Message from '../../components/messages/Message';

function Products() {

  const [data, setData] = useState([]);
  const [message, setMessage] = useState();
  const [refresh, setRefresh] = useState(false);
  const [loading, setLoading] = useState(false);

  useEffect(() => {
    setLoading(true);
    // Duomenu paemimas naudojant fetch funkcija
    // fetch('http://localhost:8000/api')
    // .then(resp =>resp.json())
    // .then(resp => {
    //   setData(resp);
    // });

    // Duomenu paemimas naudojant axios moduli
    axios.get('http://localhost:8000/api/products')
      .then(resp => {
        setData(resp.data);
    })
      .finally(() => setLoading(false));
  }, [refresh]);

  const handleDelete = (id) => {
    setLoading(true);
    axios.delete('http://localhost:8000/api/products/' + id)
    .then(resp => {
      setMessage({m: resp.data, s: 'success'});
      setRefresh(!refresh);
    })
    .finally(() => setLoading(false));
  }

  return (
    <>
      <Loading show={loading}/>

      <div className='d-flex justify-content-between align-items-center'>
        <h1>Produktų sąrašas</h1>
        <Link to='/admin/new-product' className='btn btn-primary'>New Product</Link>
      </div>


      <Message message={message} />

      <table className='table'>
        <thead>
          <tr>
            <td>#</td>
            <td>Product</td>
            <td>SKU</td>
            <td>Warehouse QTY</td>
            <td>Price</td>
            <td>Status</td>
            <td>Created at</td>
          </tr>
        </thead>
        <tbody>
          {data.map(product =>
            <tr key={product.id}>
              <td>{product.id}</td>
              <td>{product.name}</td>
              <td>{product.sku}</td>
              <td>{product.warehouse_qty}</td>
              <td>{product.price} €</td>
              <td>{product.status ? 'On' : 'Off'}</td>
              <td>{(new Date(product.created_at)).toLocaleString('lt-LT')}</td>
              <td>
                <button className='btn btn-danger' onClick={() => handleDelete(product.id)}>Delete</button>
              </td>
            </tr>
          )}
        </tbody>
      </table>
    </>
  );
}

export default Products;