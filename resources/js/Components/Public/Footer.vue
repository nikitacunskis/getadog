<template>
    <div class="footer-container">
      <div class="row-container">
        <div class="items-center">
            <div>
                <span>Strudel Ⓒ 2023</span>
            </div>
            <div>
                <ul class="list-none py-3">
                    <li>Developed by <a href="https://github.com/nikitacunskis/getadog" class="link">Nikita Cunskis</a></li>
                    <li>Designed by <a href="https://www.linkedin.com/in/polinakulagina/" class="link">Polina Kulagina</a></li>
                </ul>
            </div>
        </div>  
        <div class="flex text-right">
            <div>
                <ul class="list-none flex flex-row social-list">
                    <li><a href="https://www.facebook.com/nepercadopte" target="_blank">Facebook</a></li>
                    <li><a href="https://www.instagram.com/nepercadopte_/" target="_blank">Instagram</a></li>
                </ul>
            </div>
        </div>  
      </div>
    </div>
  </template>
  
  <style>
  .footer-container {
    color: #1A202C;
    width: 100%;
    background-color: #F7FAFC;
    border-top: 1px solid #E2E8F0;
    padding: 20px 0;
    font-family: 'Raleway', sans-serif;
  }
  
    /* .border-top {
        height: 1px;
        background-color: #E2E8F0;
    } */
  
  .row-container {
    max-width: 940px;
    margin: 0 auto;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }
  
  .left-column {
    text-align: left;
  }
  
  .right-column {
    text-align: right;
  }
  
  .link {
    text-decoration: underline;
  }
  
  .social-list li {
    padding: 10px;
  }
  </style>
  