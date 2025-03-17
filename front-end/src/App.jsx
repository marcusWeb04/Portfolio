import { useState } from 'react'
import { Route,Routes } from 'react-router';
import Nav from './component/Nav'
import Home from './pages/Home';

function App() {
  return (
    <>
    <Nav />
    <Routes>
        <Route path="/" element={<Home/>}></Route>
        <Route path="/connexion"></Route>
    </Routes>
    </>
  )
}

export default App
