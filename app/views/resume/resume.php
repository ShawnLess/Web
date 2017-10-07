<div id="resume-content"> 

<div id=resume_sidebar>
<!--The image of myself -->
<div id="headimage" >
<img src= '<?php echo DIR. "/files/resume.jpg" ?>'> </img>
</div>

<div id="contact" class="resume_sidebarbox">

<p>  
<span style="font-size:20px"> Senior Research Scientiest </span> </br>
State Key Laboratory of ASIC </br>
Chinese Academy of Sciences,  Beijing, China, 100190 
</p>

<p>  
<span style="font-size:20px"> Visiting Scholar </span> </br>
Computer Science and Engineering </br> 
University of California, San Diego 92093 
</p>

<p> 
<b> email:</b> <a href="mailto:shawnless.xie@gmail.com"> shawnless.xie@gmail.com </a>
</p>

<p>
<b> linkedin: </b> <a href="https://cn.linkedin.com/in/shawnless"> https://cn.linkedin.com/in/shawnless</a>
</p>

</div><!--contact -->
</div><!--resume_sidebar -->

<!--Start of the main resume -->
<div id="main_resume">

  <!--Start of the BIO -->
  <div class="section">
    <div class="section-title"> Bio  </div>
  </div>  <!--section-->

  <div class="posttext"> 
    <p> I got my bachelor degree in 2004, and master degree in 2006 at Zhejiang University, China, majoring in electrical engineering; Then I got my PhD degree majoring in computer science at 2009, Chinese Academy of Sciences, China. </p>

    <p>I'm a research scientist in Chinese Academy of Sciences since graduation. My research focuses on innovative digital signal microprocessor architecture exploration. I am specialized in VLIW processor micro architecture and digital VLSI design & timing optimization, and have rich engineering experience in <b>full flow chip tape out</b>. </p> 

    <p>Currently, I am very interested in open source processor architecture(<b>RISC-V</b>), configurable computing(<b>CGRA</b>) and Hardware Accelerator( Deep Learning, Data Center, IoT).
    </p>
   </div>  <!--posttext-->

  <!--Start of the experience -->
  <div class="section">
    <div class="section-title"> Experience  </div>
  </div>  <!--section-->

  <div class="posttext"> 
  <div class="research-title">  Visiting Scholar  </div>
  <div class="research-date">  July 2016 -- Present </div> 
  <I>School of Computer Science and Engineering, UCSD, San Diego, California   </I></br>
  <ul>
     <li>  Work with <a href=http://cseweb.ucsd.edu/~mbtaylor/> Michael Taylor </a>, the author of MIT RAW processor and the HPCA 2015 chair </li>
     <li>  Focus on manycore and compiler directed accelerator architecture </li>
  </ul>


  <div class="research-title"> Research Scientiest </div>
  <div class="research-date">  Jan 2010 -- July 2016 </div>
  <I>Institute of Automation, Chinese Academy of Sciences, Beijing, China </I> </br>
  <b> Project: MaPU -- Mathematical Computing Processor </b>
  <div class="hide">
  <ul> 
    <li> SoC chip with 1 ARM core and 4 novel MaPU cores running at 1GHz, targeting at computation intensive applications </li>
    <li> Supported by the Strategic Priority Research Program of Chinese Academy of Sciences with 50 million CNY </li>
    <li> Successfully taped out with 40nm process. Power efficiency is about 10x of traditional CPU and GPU </li>
    <li> Results was published at top-tier computer science conference (HPCA)  </li>
  </ul>
 <I> Project Responsibility: </I>
 <ul>
     <li>Proposed and defined the MaPU Instruction Set Architecture and the detailed micro-architecture </li>
     <li>Took charge of full processor design flow, including architecture modelling, micro-architecture design, digital circuit implementation and processor tool chain development </li>
  </ul>

  <I> Project Related Skills: </I>
  <ul>
     <li> Architecture modelling:  Both architecture description language LISA2.0 (Acquired by Synopsys now) and SystemC were used for architecture modelling at the early stage. Gem5 was used for final cycle accurate simulator. </li>
     <li> Micro-architecture design: instruction fetch &amp decoding &amp dispatch, pipeline control, arithmetic unit, memory system, bus matrix, DMA etc </li>
     <li> Benchmark optimization: Algorithm level and VLIW assembling level optimization, fixed point &amp floating point, FFT, Matrix Mul, FIR, Table lookup etc </li>
     <li> Tool chain construction for innovative architecture: Took charge of simulator, linker, assembler &amp disassembler </li>
     <li> Verification Environment: Functional verification plan, systemverilog verification library, automatic run-check testcases(3000+), regression scripts </li>
     <li> STA &amp circuit optimization: Timing constrains specification, static timing analysis and debug, micro-architecture &amp circuit &amp layout optimization (500MHz to 1GHz Frequency improvement) </li>
     <li> Power Estimation &amp Analysis: Switching activity setup, library setup, power group definition. Estimated Power &amp Real Chip Power difference &lt 8% </li>
   </ul>
   </div>

    <div class="more-less"> more&gt&gt </div>

</div> <!-- end of posttext -->

  <!--Start of the publications -->
  <div class="section">
    <div class="section-title"> Publications  </div>
  </div>  <!--section-->
 
 <div class="publication"> 
 <ul>
   <li> <u>Celerity: An Open Source RISC-V Tiered Accelerator Fabric</u> </br>
	T. Ajayi, K. Al-Hawaj et al.  (<b>hotchips'17</b>). 
       (<a href="files/doc/Celerity_hotchips17.pdf"><b>PDF</b></a> )
   </li>
   <li> <u>MaPU: A novel mathematical computing architecture</u> </br>
       D. Wang, <b> S. Xie </b>, et al.IEEE <I> International Symposium on High Performance Computer Architecture </I> 
       (<b>HPCA'16</b>). IEEE, 2016.
       (<a href="files/doc/MaPU-HPCA16.pdf"><b>PDF</b></a>,
        <a href="files/doc/MaPU_HPCA16.pptx"><b>PPT</b></a>)
   </li>
</ul>

  <div class="hide">
  <b> US Patents: </b>
  <ul>
     <li> <b> S. Xie</b>, D. Wang, J. Hao, T. Wang, and L. Yin, &quot <b>Parallel bit reversal devices and methods.</b> &quot U.S. Patent No. 9,268,744. <b>Issued</b> Feb 23, 2016. Avaliable:<a href="www.google.com/patents/US20140089370"> Google Patent </a>. </li>

     <li> D. Wang, T. Wang, <b>S. Xie</b>, J.Hao, and L. Yin, &quot <b> Methods and devices for multi-granularity parallel fft butterfly computation</b>,&quote U.S. Patent No. 9,262,378, <b> Issued </b> Feb 16, 2016. Avaliable: <a href="http://www.google.com/patents/US20140330880">Google Patent</a> </li>

     <li> D. Wang, <b>S. Xie </b>, J. Hao, X. Lin, T. Wang, and L. Yin, &quot <b> Multi-granularity parallel fft computation device</b> ,&quot  U.S. Patent No. 9,176,929. <b>Issued</b> Nov 3, 2015. Avaliable:<a href="http://www.google.com/patents/US20140089369"> Google Patent </a></li>

     <li>  D. Wang, <b>S. Xie</b>, X. Xue, Z. Liu, and Z. Zhang, &quot <b> Multi-granularity parallel storage system and storage</b> ,&quot  U.S. Patent No. 9,146,696. <b>Issued</b>  Sep 29, 2015. Avaliable:<a href="http://www.google.com/patents/US9146696"> Google Patent</a> </li>

     <li>D Wang, Z Liu, X Xue, X Zhang, Z Zhang, <b> S Xie </b> , &quot <b> Multi-granularity parallel storage system </b> ,&quot  U.S. Patent No. 9,171,593, <b> Issued</b> Oct 27, 2015. Avaliable:<a href="https://www.google.com/patents/US9171593"> Google Patent </a> </li>

     <li> D Wang, <b> S Xie </b> , Y Yang, L Yin, L Wang, Z Liu, T Wang,et al., &quot <b> Processor with Polymorphic Instruction Set Architecture </b>, &quot  U.S. Patent App. 14/785,385.  Published Jun 09, 2016. Avaliable: <a href="https://www.google.com/patents/US20160162290"> Google Patent </a> </li>

     <li> <b>S. Xie</b> , X. Lin, J. Hao, X. Xue, T. Wang et al., &quot <b>Data access method and device for parallel fft calculation </b> &quot  U.S. Patent App. 14/117,375.  Published Jul 4, 2013. Avaliable <a href="https://www.google.com/patents/US20140337401"> Google Patent</a></li>

  </ul>

  <b> Selected (total 17) China Patents: (Issued) </b>
  <ul>
     <li> D. Wang, <b>S. Xie</b>, X. Xue, Z. Liu, and Z. Zhang, &quot <b> Multi-granularity parallel storage system and storage </b> .&Quot  CHN. Patent, Patent No. CN201110460585.1, issued Feb 4, 2015. Avaliable: <a href="http://www.google.com/patents/CN102541774">Goole Patent</a> </li>

     <li> D. Wang, <b> S. Xie</b>, Z. Yin, X. Lin, Z. Zhang, H. Yan, J. Xue, &quot <b> Method for generating vector processing instruction set architecture in high performance computing system</b>. &quot  CHN. Patent, Patent No. CN201010162391.9, issued May 8, 2013.  Avaliable: <a href="http://www.google.com/patents/CN101833468B">Google Patent </a> </li>

     <li> D. Wang, <b>S. Xie</b>, Z. Yin, X. Lin, Z. Zhang, H. Yan, J. Xue, &quote <b> Parallel vector processing engine structure </b> .&quote  CHN. Patent, Patent No. CN201010162350.X, issued Feb 13, 2013. Avaliable: <a href="http://www.google.com/patents/CN101833441B">Google Patent </a> </li>

     <li> D. Wang, J. Hao,  <b>S. Xie</b>, X. Du, X. Lin, &quot <b> Heterogeneous multi-core processor of two-stage computing architecture</b> . &quot CHN. Patent, Patent No. CN201110435859.1, Issued Sep 17. 2014. Avaliable: <a href="http://www.google.com/patents/CN102609245B">Google Patent </a> </li>

     <li>D. Wang, Z. Liu, X. Zhang, <b>S. Xie</b>, &quot <b> Multi-dimensional DMA (direct memory access) transmitting device and method </b> .&quot  CHN. Patent, Patent No. CN201110449966.X, issued Sep 17, 2014. Avaliable: <a href="http://www.google.com/patents/CN102567258B">Google Patent </a> </li>
   </ul>
   </div> <!-- end of hide -->
   <div class="more-less"> more&gt&gt </div>
</div><!--publication  -->
</div><!-- main_resume -->

</div><!-- content  -->
