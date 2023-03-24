import { useState, useEffect } from 'react';
import axios from 'axios';

function Products() {

  const [data, setData] = useState([]);
  const [message, setMessage] = useState(false);

  useEffect(() => {
    // Duomenu paemimas naudojant fetch funkcija
    // fetch('http://localhost:8000/api')
    // .then(resp =>resp.json())
    // .then(resp => {
    //   setData(resp);
    // });

    // Duomenu paemimas naudojant axios moduli
    axios.get('http://localhost:8000/api/products')
      .then(resp => setData(resp.data));
  }, [message]);

  const handleDelete = (id) => {
    axios.delete('http://localhost:8000/api/products/' + id)
    .then(resp => setMessage(resp.data));
  }

  return (
    <>
      <h1>Produktų sąrašas</h1>
      {message &&
        <div className='alert alert-success'>{message}</div>
      }
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
              <td><button className='btn btn-danger' onClick={() => handleDelete(product.id)}>Delete</button></td>
            </tr>
          )}
        </tbody>
      </table>
    </>
  );
}

export default Products;