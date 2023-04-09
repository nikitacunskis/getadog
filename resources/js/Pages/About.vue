<script setup>
  import PublicLayout from '@/Layouts/PublicLayout.vue';
  import Content from '@/Components/Public/Content.vue';
  import ContentImage from '@/Components/Public/ContentImage.vue';
</script>
<template>
  <PublicLayout>
    <div class="grid grid-cols-2 gap-4 md:gap-8 lg:gap-12 content-container">
      <Content>
        <ContentImage src="/files/pet5_strudelok-212.png" align="right" />
        <p>Pirmais paragrāfs varētu būt par to, kā suņu adopcijas portāls var palīdzēt suņiem atrast mājas. Patversmēs bieži vien ir daudz suņu, kas meklē mājas, un adopcijas portāls var palīdzēt tiem atrast piemērotus īpašniekus. Suņu adopcijas portāli parasti piedāvā informāciju par suņiem, to iezīmēm, vēsturi un personību, kas var palīdzēt potenciālajiem īpašniekiem izvēlēties piemērotu suņu, kas būs piemērots viņu dzīvesveidam un vajadzībām.</p>
        <p>Otrais paragrāfs varētu būt par to, kā suņu adopcijas portāls var palīdzēt samazināt suņu skaitu patversmēs. Patversmēs bieži vien ir ierobežotas vietas un resursi, un dažreiz suņi tiek nošauti, ja nav pietiekami daudz vietas viņu uzturēšanai. Adopcijas portāli palīdz atbrīvot vietu patversmēs, lai tie varētu turpināt uzņemt un kopēt vairāk suņu, kuriem ir nepieciešama palīdzība.</p>
        <ContentImage src="/files/pet9_shtrudelok-122.jpg" align="left" />
        <p>Trešais paragrāfs varētu būt par to, kā suņu adopcijas portāls var palīdzēt uzlabot suņu dzīves kvalitāti. Suņi, kas ir patversmēs, bieži vien ir pamesti vai cietuši no ļaunprātīgas izturēšanās un var būt fiziski un emocionāli traumēti. Adopcijas portāls var palīdzēt tiem atrast mīlošu mājokli un atjaunot ticību cilvēkiem.</p>
        <p>Ceturtais paragrāfs varētu būt par to, kā suņu adopcijas portāls var palīdzēt uzlabot sabiedrības izpratni par suņiem un to labklājību. Portāli var sniegt informāciju par suņu rūpēm un atbildīgu suņu īpašniecību, kas var palīdzēt samazināt suņu ļaunprātīgas izturēšanās gadījumus un suņu</p>
      </Content>
    </div>
  </PublicLayout>
</template>

<style>
body {
  background: #F8FAFC;
}

.content-container {
  display: flex; 
  justify-content: center;
}

.card {
  width: 940px;
  border-radius: 4px;
  border: 1px solid #E2E8F0;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  overflow: hidden;
  background-color: #FFFFFF;
}

.card-text {
  padding: 20px;
  color: #1A202C;
  font-family: 'Gotham Pro', sans-serif;
  font-size: 12pt;
  font-weight: regular;
}

.card-text p:not(:first-child) {
  padding-top: 24px; /* add padding to all p elements except first */
}
</style>

