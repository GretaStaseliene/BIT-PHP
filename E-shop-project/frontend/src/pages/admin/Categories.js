import { useEffect, useContext, useState } from 'react';
import axios from 'axios';
import { Link } from 'react-router-dom';
import MainContext from '../../context/MainContext';
import AdminTableButtons from '../../components/adminTableButtons/AdminTableButtons';

function Categories() {

    const [data, setData] = useState([]);

    const { refresh, setRefresh, setLoading, setMessage } = useContext(MainContext);

    useEffect(() => {
        setLoading(true);

        axios.get('http://localhost:8000/api/categories')
            .then(resp => {
                setData(resp.data);
            })
            .finally(() => setLoading(false));
    }, [refresh]);

    const handleDelete = (id) => {
        setLoading(true);
        axios.delete('http://localhost:8000/api/categories/' + id)
            .then(resp => {
                setMessage({ m: resp.data, s: 'success' });
                setRefresh(!refresh);
            })
            .finally(() => setLoading(false));
    }

    return (
        <>
            <div className='d-flex justify-content-between align-items-center'>
                <h1>Categories List</h1>
                <Link to='/admin/new-category' className='btn btn-primary'>New Category</Link>
            </div>

            <table className='table'>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Categorie</th>
                        <th>Created at</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    {data.map(item =>
                        <tr key={item.id}>
                            <td>{item.id}</td>
                            <td>{item.name}</td>
                            <td>{(new Date(item.created_at)).toLocaleString('lt-LT')}</td>
                            <td>
                                <AdminTableButtons id={item.id} link='category' deleteFn={handleDelete} />
                            </td>
                        </tr>
                    )}
                </tbody>
            </table>
        </>
    );
}

export default Categories;