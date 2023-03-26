import './App.css';
import { BrowserRouter, Routes, Route } from 'react-router-dom';
import Main from './layouts/Main';
import Products from './pages/Products';
import AdminProducts from './pages/admin/Products';
import NewProduct from './pages/admin/NewProduct';


function App() {
  return (
    <>
    <BrowserRouter>
      <Main>
      <Routes>
        <Route path='/' element={<Products />} />
        <Route path='/admin' element={<AdminProducts />} />
        <Route path='/admin/new-product' element={<NewProduct />} />
      </Routes>
      </Main>
    </BrowserRouter>
    </>
  );
}

export default App;
