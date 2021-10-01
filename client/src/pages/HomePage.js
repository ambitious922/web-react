import React from 'react';
import ReactDOM from 'react-dom';
import BuilderConfig from './BuilderConfig';

// Домашняя страница. Пока только FAQ. Надо будет добавить стату
// TODO: добавить стату
class HomePage extends React.Component {
    render () {
        return (
            <div>
                <h1 class="animated fadeIn">Welcome to Cerberus V4 Admin Panel</h1>
                <div class="row">
                    
                    
                    <div class="col-sm">
                        <div class="card animated fadeIn">
                            <div class="card-header">
                                <h5 class="mb0 h3info" style={({marginTop:'10px'})}>Support Info</h5>
                            </div>
                            <div class="card-body">
                            <a class="info" href="/" target="_blank"></a><a class="warn" href="/" target="_blank"></a><a class="info" href="/" target="_blank"></a> 
                            <br />
                            <br />
                            Contact Support İCQ: <span class="info">Ejection</span>
                            <br />
                            <br />
                            <h5></h5>
                            <span class="warn"></span>
                            <br /><span class="warn"></span>
                            <br /><span class="warn"></span>
                            <br /><span class="warn"></span>
                            <br /><a href="" target="_blank" class="warn"></a>
                            <br /><span class="warn"></span>
                            <br /><a href="" target="_blank" class="warn"></a>
                            <br /><span class="warn"></span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-sm">
                        <div class="card animated fadeIn">
                            <div class="card-header">
                                <h5 class="mb0 h3info" style={({marginTop:'10px'})}>Builder</h5>
                            </div>
                            <div class="card-body builder-hr">
                                <BuilderConfig />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}

export default HomePage;