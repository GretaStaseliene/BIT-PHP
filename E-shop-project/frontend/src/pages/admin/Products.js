import { useEffect, useContext, useState } from 'react';
import axios from 'axios';
import { Link } from 'react-router-dom';
import MainContext from '../../context/MainContext';
import AdminTableButtons from '../../components/adminTableButtons/AdminTableButtons';

function Products() {

  const [data, setData] = useState([]);

  const { refresh, setRefresh, setLoading, setMessage } = useContext(MainContext);

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
        setMessage({ m: resp.data, s: 'success' });
        setRefresh(!refresh);
      })
      .finally(() => setLoading(false));
  }

  return (
    <>
      <div className='d-flex justify-content-between align-items-center mb-3'>
        <h1>Products List</h1>
        <div className='d-flex gap-3 justify-content-end'>
          <Link to='/admin/new-product' className='btn btn-primary'>New Product</Link>
          <Link to='/admin/orders' className='btn btn-primary'>Orders</Link>
        </div>
      </div>

      <table className='table'>
        <thead>
          <tr>
            <th>#</th>
            <th>Product</th>
            <th>SKU</th>
            <th>QTY</th>
            <th>Price</th>
            <th>Status</th>
            <th>Category</th>
            <th>Date</th>
          </tr>
        </thead>
        <tbody>
          {data.map(item =>
            <tr key={item.id}>
              <td>{item.id}</td>
              <td>{item.name}</td>
              <td>{item.sku}</td>
              <td>{item.warehouse_qty}</td>
              <td>{item.price} €</td>
              <td>{item.status ? 'On' : 'Off'}</td>
              <td>{item.categories.map(cat => cat.name).join(', ')}</td>
              <td>{(new Date(item.created_at)).toLocaleString('lt-LT')}</td>
              <td>
                <AdminTableButtons id={item.id} link='product' deleteFn={handleDelete} />
              </td>
            </tr>
          )}
        </tbody>
      </table>
    </>
  );
}

export default Products;