<?php
	include "head.php";
?>
	<div class="container">
		<div class="jumbotron">
			<h1>FAQ</h1>
			<p>
    I’m having trouble with kallisto. Can I get help?
        Yes. If you think you have discovered a bug that needs to be fixed please file a report on the GitHub page. If you have a question about installing or running the program please ask on the kallisto-sleuth-users Google user group.
    Where can I get announcements about new releases?
        You can get announcements via the kallisto-sleuth-announcements Google group. This is a read-only, low traffic mailing list that only sends an email when a major version is released.
    kallisto is fast but is it as accurate as other quantification tools?
        Yes. The source of kallisto’s speed is the novel concept of pseudoalignment of reads. Pseudosalignment is all that is needed for accurate quantification, and in tests on both real and simulated data we find that kallisto is frequently more accurate than existing methods. The increase in accuracy over some methods is due to the robustness of pseudoalignment to read base errors and indels, and the ability to perform many rounds of the Expectation-Maximization algorithm.
    Can kallisto be used for finding differentially expressed genes in RNA-Seq analysis?
        No. kallisto can be used to build indices for quantification, and it can quantify RNA-Seq samples. It is also useful for assessing the reliability of abundance estimates via the bootstrap samples it produces. But it is not a tool for performing differential analysis. However the companion tool sleuth is designed to for that purpose, and sleuth uses the boostrapped samples produced by kallisto.
    Is kallisto usable with both single-end and paired-end reads?
        Yes.
    Does kallisto require reads to be of the same length?
        No.
    Can kallisto be used to quantify single-cell RNA-Seq data?
        Yes.
    I’ve already mapped all my reads. Can I use those mappings with kallisto?
        No. The mappings are not relevant and not needed for kallisto.
    Are you distributing pre-built indices?
        No. Building indices with kallisto index will be faster in practice than downloading index files. For example, the kallisto index for the human transcriptome takes between 5–10 minutes to build on a standard desktop or laptop. We are distributing transcriptome fasta files for model organisms here.
    My RNA-Seq was prepared with a stranded library. Is there a special option I need to use with kallisto?
        No.
    Is there a reason you picked the name kallisto for your program?
        Yes.
</p>
		</div>
	</div>
<?php
	include "footer.php";
?>