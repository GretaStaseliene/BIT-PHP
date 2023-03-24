import './App.css';
import { BrowserRouter, Routes, Route } from 'react-router-dom';
import Main from './layouts/Main';
import Products from './pages/Products';
import AdminProducts from './pages/admin/Products';


function App() {
  return (
    <>
    <BrowserRouter>
      <Main>
      <Routes>
        <Route path='/' element={<Products />} />
        <Route path='/admin' element={<AdminProducts />} />
      </Routes>
      </Main>
    </BrowserRouter>
    </>
  );
}

export default App;
