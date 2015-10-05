function r = findArrows(img)
	 
	BW = edge(img(:,:,3),'Sobel','horizontal');
	 
	[H,T,R] = hough(BW);
	P = houghpeaks(H,5,'threshold',ceil(0.8*max(H(:))));
	x = T(P(:,2));
	y = R(P(:,1));
	
	lines = houghlines(BW,T,R,P,'FillGap',50,'MinLength',100);
	arrows = cell(length(lines),2);
	 
	for i = 1:length(lines)
		arrows{i,1} = lines(i).point2(1);
		arrows{i,2} = lines(i).point2(2);
	end

	r = arrows;
end

%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
%
% Function: findArrows
%
% Called From: doVideoAnalysis, doImageAnalysis.
% Returns: An array of arrow point positions.
% Description: Takes a picture of 1 or more arrows and determines the point at which they meet the target.
%
% PSEUDOCODE:
%
% findArrows(img):
% 	for i in xrange(0,count(arrows)):
% 		#
% 	return arrows